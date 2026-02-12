<?php

namespace App\Http\Controllers;

use App\Models\QuickRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuickRequestNotification;

class QuickRequestController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'phone' => ['required', 'string', 'min:6', 'max:25'],
            'email' => ['required', 'email', 'max:120'],
            'service_ids' => ['array'],
            'service_ids.*' => ['integer', 'exists:services,id'],
        ]);

        $qr = QuickRequest::create([
            'phone' => $data['phone'],
            'email' => $data['email'],
            'service_ids' => $data['service_ids'] ?? [],
            'status' => 'received',
        ]);

        try {
            Mail::to('info@anzunzucommercialexports.com')->send(new QuickRequestNotification($qr));
        } catch (\Throwable $e) {
            // silently ignore mail errors
        }

        if ($request->wantsJson()) {
            return response()->json([
                'ok' => true,
                'message' => 'Instant reply: request received. Our team will contact you shortly.',
                'id' => $qr->id,
            ]);
        }

        return redirect()->back()->with('status', 'Instant reply: request received. Our team will contact you shortly.');
    }
}
