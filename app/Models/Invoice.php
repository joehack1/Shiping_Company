<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'client_name',
        'issue_date',
        'due_date',
        'currency',
        'items',
        'subtotal',
        'tax_rate',
        'tax_amount',
        'total_amount',
        'account_details',
        'terms',
    ];

    protected $casts = [
        'items' => 'array',
        'issue_date' => 'date',
        'due_date' => 'date',
        'subtotal' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    protected static function booted(): void
    {
        static::saving(function (Invoice $invoice) {
            $items = collect($invoice->items ?? []);
            $subtotal = $items->reduce(function ($carry, $line) {
                $price = (float) ($line['unit_price'] ?? 0);
                $qty = (float) ($line['quantity'] ?? 0);
                return $carry + ($price * $qty);
            }, 0.0);
            $taxRate = (float) ($invoice->tax_rate ?? 16.0);
            $taxAmount = round($subtotal * ($taxRate / 100.0), 2);
            $total = round($subtotal + $taxAmount, 2);

            $invoice->subtotal = round($subtotal, 2);
            $invoice->tax_rate = $taxRate;
            $invoice->tax_amount = $taxAmount;
            $invoice->total_amount = $total;

            if (empty($invoice->invoice_number)) {
                $invoice->invoice_number = 'INV-' . now()->format('Ymd') . '-' . strtoupper(substr(md5(uniqid('', true)), 0, 5));
            }
            if (empty($invoice->issue_date)) {
                $invoice->issue_date = now()->toDateString();
            }
        });
    }
}
