@extends('layouts.app')

@section('title', 'About | BlueWave Shipping')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">About Us</span>
            <h1>Built in Kenya for disciplined international logistics.</h1>
            <p>BlueWave Shipping is a Kenya-based freight forwarding and warehousing company focused on overseas shipping, import coordination, and reliable storage solutions. We prioritize compliance, operational clarity, and consistent delivery outcomes.</p>
            <div class="hero-actions">
                <a class="button-primary" href="{{ url('/services') }}">View Services</a>
                <a class="button-outline" href="{{ url('/contact') }}">Talk to Us</a>
            </div>
        </div>
        <div class="hero-card">
            <h3>Our Mission</h3>
            <p class="muted">To simplify global trade for Kenyan businesses with transparent logistics, proactive risk management, and secure storage infrastructure.</p>
            <div class="stats">
                <div class="stat">
                    <strong>15+</strong>
                    <span>Global agent partners</span>
                </div>
                <div class="stat">
                    <strong>3</strong>
                    <span>Kenya facilities</span>
                </div>
                <div class="stat">
                    <strong>100%</strong>
                    <span>Compliance-led processes</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="panel">
    <div class="container">
        <h2 class="panel-title">What We Stand For</h2>
        <p class="panel-subtitle">BlueWave is built on accountability, operational control, and long-term partnerships.</p>
        <div class="cards">
            <div class="card">
                <h3>Compliance First</h3>
                <p>Every shipment is managed with the documentation, duties, and regulatory approvals required by Kenyan authorities and international carriers.</p>
            </div>
            <div class="card">
                <h3>Operational Discipline</h3>
                <p>We run standardized processes across shipments, warehousing, and customs to eliminate surprises and protect delivery timelines.</p>
            </div>
            <div class="card">
                <h3>Visibility & Control</h3>
                <p>Clients receive clear milestone updates, tracking checkpoints, and fast exception handling through a dedicated control desk.</p>
            </div>
        </div>
    </div>
</section>
@endsection
