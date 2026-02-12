@extends('layouts.app')

@section('title', 'Overseas Shipping | Anzunzu Commercial Exports')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">Overseas Shipping</span>
            <h1>Global freight coordination with predictable timelines.</h1>
            <p>We handle ocean and air shipments from origin booking to discharge in Kenya. Every movement is supervised by a dedicated account manager.</p>
            <div class="hero-actions">
                <a class="button-primary" href="{{ url('/quote') }}">Get Shipping Quote</a>
                <a class="button-outline" href="{{ url('/tracking') }}">Track Shipment</a>
            </div>
        </div>
        <div class="hero-card">
            <h3>Shipping Modes</h3>
            <div class="list">
                <div class="list-item">Full Container Load (FCL)</div>
                <div class="list-item">Less than Container Load (LCL)</div>
                <div class="list-item">Air Freight & Express</div>
                <div class="list-item">Project & Breakbulk Cargo</div>
            </div>
        </div>
    </div>
</section>

<section class="panel">
    <div class="container section-split">
        <div>
            <h2 class="panel-title">What You Receive</h2>
            <p class="panel-subtitle">We deliver structured processes, clear documentation, and active risk management.</p>
            <div class="list">
                <div class="list-item">Carrier and route selection optimized for transit time.</div>
                <div class="list-item">Complete export documentation and compliance checks.</div>
                <div class="list-item">Live milestone updates for every sailing leg.</div>
            </div>
        </div>
        <div class="card">
            <h3>Key Trade Lanes</h3>
            <p class="muted">Asia to Kenya, Europe to Kenya, UAE to Kenya, and North America to Kenya. We align booking schedules to Kenyan port availability to minimize demurrage.</p>
        </div>
    </div>
</section>
@endsection
