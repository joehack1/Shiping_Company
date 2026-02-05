@extends('layouts.app')

@section('title', 'Services | BlueWave Shipping')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">Services</span>
            <h1>End-to-end shipping, import, and warehousing services.</h1>
            <p>From overseas shipping coordination to bonded storage and distribution, BlueWave provides a single disciplined logistics partner for Kenya-based businesses.</p>
        </div>
        <div class="hero-card">
            <h3>Service Coverage</h3>
            <p class="muted">Ocean freight, air freight, customs brokerage, inland haulage, warehousing, inventory management, and last-mile coordination.</p>
        </div>
    </div>
</section>

<section class="panel">
    <div class="container">
        <div class="cards">
            @if(isset($services) && $services->count())
                @foreach($services as $service)
                    <div class="card">
                        <h3>{{ $service->name }}</h3>
                        @if($service->summary)
                            <p>{{ $service->summary }}</p>
                        @elseif($service->description)
                            <p>{{ $service->description }}</p>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="card">
                    <h3>Overseas Shipping</h3>
                    <p>FCL/LCL bookings, carrier negotiations, export documentation, and vessel tracking across global trade lanes.</p>
                </div>
                <div class="card">
                    <h3>Import Management</h3>
                    <p>Customs declarations, duty assessment, compliance review, and port clearance coordination in Kenya.</p>
                </div>
                <div class="card">
                    <h3>Warehousing</h3>
                    <p>Secure storage, inventory audits, bonded facilities, and distribution staging with scalable space options.</p>
                </div>
                <div class="card">
                    <h3>Project Cargo</h3>
                    <p>Oversized shipments, heavy-lift planning, and multi-modal routing with detailed risk control.</p>
                </div>
                <div class="card">
                    <h3>Supply Chain Reporting</h3>
                    <p>Custom KPI dashboards, milestone reporting, and exception management across every shipment.</p>
                </div>
                <div class="card">
                    <h3>Last-Mile Delivery</h3>
                    <p>Inland trucking, delivery scheduling, and proof-of-delivery coordination across Kenya.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
