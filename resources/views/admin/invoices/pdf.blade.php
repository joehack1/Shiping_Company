<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $invoice->invoice_number }}</title>
    <style>
        body { font-family: DejaVu Sans, Arial, sans-serif; color: #0b1424; }
        .container { width: 90%; margin: 0 auto; }
        .header { display: flex; align-items: center; justify-content: space-between; border-bottom: 2px solid #d6e3f5; padding-bottom: 12px; margin-bottom: 16px; }
        .brand { display: flex; align-items: center; gap: 12px; }
        .brand img { width: 64px; height: 64px; object-fit: contain; }
        .brand .name { font-size: 20px; font-weight: 700; }
        .meta { text-align: right; font-size: 12px; color: #5b6b86; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #d6e3f5; padding: 8px; font-size: 12px; }
        th { background: #eaf4ff; text-align: left; }
        .totals { width: 40%; margin-left: auto; margin-top: 12px; }
        .totals td { border: none; }
        .totals .label { color: #5b6b86; }
        .totals .amount { text-align: right; }
        .section { margin-top: 18px; }
        .section h3 { margin: 0 0 8px; font-size: 14px; }
        .muted { color: #5b6b86; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="brand">
                <img src="{{ public_path('assets/1.png') }}" alt="Logo">
                <div>
                    <div class="name">Anzunzu Commercial Exports</div>
                    <div class="muted">Invoice</div>
                </div>
            </div>
            <div class="meta">
                <div><strong>Invoice #:</strong> {{ $invoice->invoice_number }}</div>
                <div><strong>Issue Date:</strong> {{ optional($invoice->issue_date)->format('Y-m-d') }}</div>
                <div><strong>Due Date:</strong> {{ optional($invoice->due_date)->format('Y-m-d') }}</div>
            </div>
        </div>

        <div class="section">
            <h3>Bill To</h3>
            <div class="muted">{{ $invoice->client_name }}</div>
        </div>

        <div class="section">
            <h3>Items</h3>
            <table>
                <thead>
                    <tr>
                        <th style="width: 28%;">Service</th>
                        <th>Description</th>
                        <th style="width: 14%;">Unit Price</th>
                        <th style="width: 14%;">Qty</th>
                        <th style="width: 16%;">Line Total</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $items = collect($invoice->items ?? []);
                    $services = \App\Models\Service::query()->whereIn('id', $items->pluck('service_id')->filter())->get()->keyBy('id');
                @endphp
                @foreach($items as $line)
                    @php
                        $serviceName = optional($services->get($line['service_id'] ?? null))->name;
                        $price = (float) ($line['unit_price'] ?? 0);
                        $qty = (float) ($line['quantity'] ?? 0);
                        $lineTotal = round($price * $qty, 2);
                    @endphp
                    <tr>
                        <td>{{ $serviceName }}</td>
                        <td>{{ $line['description'] ?? '' }}</td>
                        <td>{{ $invoice->currency }} {{ number_format($price, 2) }}</td>
                        <td>{{ $qty }}</td>
                        <td>{{ $invoice->currency }} {{ number_format($lineTotal, 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <table class="totals">
            <tr>
                <td class="label">Subtotal</td>
                <td class="amount">{{ $invoice->currency }} {{ number_format($invoice->subtotal, 2) }}</td>
            </tr>
            <tr>
                <td class="label">Tax ({{ number_format($invoice->tax_rate, 2) }}%)</td>
                <td class="amount">{{ $invoice->currency }} {{ number_format($invoice->tax_amount, 2) }}</td>
            </tr>
            <tr>
                <td class="label"><strong>Total</strong></td>
                <td class="amount"><strong>{{ $invoice->currency }} {{ number_format($invoice->total_amount, 2) }}</strong></td>
            </tr>
        </table>

        @if($invoice->account_details)
            <div class="section">
                <h3>Account Details</h3>
                <div class="muted">{!! nl2br(e($invoice->account_details)) !!}</div>
            </div>
        @endif

        @if($invoice->terms)
            <div class="section">
                <h3>Terms & Conditions</h3>
                <div class="muted">{!! nl2br(e($invoice->terms)) !!}</div>
            </div>
        @endif
    </div>
</body>
</html>
