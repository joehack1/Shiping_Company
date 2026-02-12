<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Request Received</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; max-width: 640px; margin: 0 auto; color: #0b1424;">
        <div style="display:flex; align-items:center; gap: 12px; border-bottom: 2px solid #d6e3f5; padding-bottom: 10px; margin-bottom: 16px;">
            <img src="{{ asset('assets/1.png') }}" alt="Logo" style="width:48px; height:48px; object-fit:contain;">
            <div>
                <div style="font-weight:700;">Anzunzu Commercial Exports</div>
                <div style="color:#5b6b86; font-size: 12px;">Request Confirmation</div>
            </div>
        </div>

        <p>Thanks for your request. Our team will contact you shortly.</p>

        <table cellpadding="6" cellspacing="0" border="0" style="border-collapse: collapse;">
            <tr>
                <td style="color:#5b6b86;">Phone</td>
                <td>{{ $requestData->phone }}</td>
            </tr>
            <tr>
                <td style="color:#5b6b86;">Email</td>
                <td>{{ $requestData->email }}</td>
            </tr>
            <tr>
                <td style="color:#5b6b86; vertical-align: top;">Services</td>
                <td>
                    @if(count($services))
                        <ul style="margin:0; padding-left:18px;">
                            @foreach($services as $svc)
                                <li>{{ $svc->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        None selected
                    @endif
                </td>
            </tr>
            <tr>
                <td style="color:#5b6b86;">Submitted</td>
                <td>{{ $requestData->created_at->format('Y-m-d H:i') }}</td>
            </tr>
        </table>

        <p style="margin-top:16px; color:#5b6b86;">We’ll reply to this email with next steps.</p>
    </div>
</body>
</html>
