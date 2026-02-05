@extends('layouts.app')

@section('title', 'Importing | BlueWave Shipping')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">Import Management</span>
            <h1>Structured clearance, compliant documentation, and faster release.</h1>
            <p>We streamline import workflows with a focus on regulatory compliance, clear duty calculations, and proactive engagement with Kenya Revenue Authority and Kenya Ports Authority processes.</p>
            <div class="hero-actions">
                <a class="button-primary" href="{{ url('/contact') }}">Speak to Clearance Team</a>
                <a class="button-outline" href="{{ url('/quote') }}">Request Quote</a>
            </div>
        </div>
        <div class="hero-card">
            <h3>Import Capabilities</h3>
            <div class="list">
                <div class="list-item">Customs declarations & HS code review</div>
                <div class="list-item">Duty & tax estimation</div>
                <div class="list-item">Port release and delivery scheduling</div>
                <div class="list-item">Post-clearance compliance audit</div>
            </div>
        </div>
    </div>
</section>

<section class="panel">
    <div class="container">
        <h2 class="panel-title">Dedicated Import Desk</h2>
        <p class="panel-subtitle">We assign a clearance specialist to your shipments for end-to-end coordination and exception handling.</p>
        <div class="cards">
            <div class="card">
                <h3>Documentation Control</h3>
                <p>Verification of invoices, packing lists, certificates of origin, and permits.</p>
            </div>
            <div class="card">
                <h3>Release Management</h3>
                <p>Continuous communication with port operators and inland freight stations.</p>
            </div>
            <div class="card">
                <h3>Duty Optimization</h3>
                <p>Accurate tariff classification and exemption guidance where applicable.</p>
            </div>
        </div>
    </div>
</section>
@endsection
