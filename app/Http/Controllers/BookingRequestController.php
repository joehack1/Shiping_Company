<?php

namespace App\Http\Controllers;

use App\Models\BookingRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingRequestController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'min:6', 'max:25'],
            'where_to' => ['required', 'string', 'max:160'],
            'service_ids' => ['array'],
            'service_ids.*' => ['integer', 'exists:services,id'],
        ]);

        $br = BookingRequest::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'where_to' => $data['where_to'],
            'service_ids' => $data['service_ids'] ?? [],
            'status' => 'received',
        ]);

        try {
            Mail::raw(
                'New booking: ' . $br->name . ' | ' . $br->phone . ' | ' . $br->where_to . ' | services: ' . implode(',', $br->service_ids ?? []),
                function ($m) {
                    $m->to('info@anzunzucommercialexports.com')->subject('New Booking Request');
                }
            );
        } catch (\Throwable $e) {}

        if ($request->wantsJson()) {
            return response()->json([
                'ok' => true,
                'message' => 'Booking received. Our team will contact you shortly.',
                'id' => $br->id,
            ]);
        }

        return redirect()->back()->with('status', 'Booking received. Our team will contact you shortly.');
    }
}
