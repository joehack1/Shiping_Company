@extends('layouts.app')

@section('title', 'Warehousing | Anzunzu Commercial Exports')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">Warehousing & Storage</span>
            <h1>Secure storage facilities in Nairobi and Mombasa.</h1>
            <p>Our warehousing network supports bonded storage, temperature-controlled handling, and inventory management for importers and exporters.</p>
            <div class="hero-actions">
                <a class="button-primary" href="{{ url('/quote') }}">Request Storage Quote</a>
                <a class="button-outline" href="{{ url('/contact') }}">Schedule a Visit</a>
            </div>
        </div>
        <div class="hero-card">
            <h3>Facility Highlights</h3>
            <div class="list">
                <div class="list-item">24/7 CCTV and access control</div>
                <div class="list-item">Bonded and non-bonded storage</div>
                <div class="list-item">Cross-docking and consolidation</div>
                <div class="list-item">Inventory audits & reporting</div>
            </div>
        </div>
    </div>
</section>

<section class="panel">
    <div class="container section-split">
        <div>
            <h2 class="panel-title">Storage Options</h2>
            <p class="panel-subtitle">Flexible contracts for short-term and long-term storage requirements.</p>
            <div class="list">
                <div class="list-item">High-security cage storage for valuables.</div>
                <div class="list-item">Temperature-managed zones for sensitive cargo.</div>
                <div class="list-item">Pick, pack, and distribution staging.</div>
            </div>
        </div>
        <div class="card">
            <h3>Warehouse Locations</h3>
            <p class="muted">Nairobi: Industrial Area hub with direct highway access.</p>
            <p class="muted">Mombasa: Port-adjacent facility optimized for fast container turnaround.</p>
        </div>
    </div>
</section>
@endsection
