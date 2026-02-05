@extends('layouts.app')

@section('title', 'Tracking | BlueWave Shipping')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">Shipment Tracking</span>
            <h1>Real-time milestone visibility.</h1>
            <p>Enter your reference number to view the latest milestones, clearance status, and delivery planning updates.</p>
        </div>
        <div class="hero-card">
            <h3>Track a Shipment</h3>
            <form>
                <div class="form-grid">
                    <div>
                        <label for="reference">Reference Number</label>
                        <input id="reference" type="text" placeholder="BW-KE-2026-0001">
                    </div>
                    <div>
                        <label for="email">Notification Email</label>
                        <input id="email" type="email" placeholder="name@company.com">
                    </div>
                </div>
                <div class="form-actions">
                    <button class="button-primary" type="button">View Status</button>
                </div>
            </form>
            <p class="muted" style="margin-top: 12px;">Tracking portal integration available for enterprise customers.</p>
        </div>
    </div>
</section>
@endsection
