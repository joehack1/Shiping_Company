@extends('layouts.app')

@section('title', 'BlueWave Shipping | Kenya Overseas Logistics')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">Kenya-based International Logistics</span>
            <h1>Serious overseas shipping, import management, and secure warehousing.</h1>
            <p>BlueWave Shipping connects Kenya to the world with disciplined freight forwarding, customs coordination, and bonded storage solutions. We handle the details from origin to last-mile delivery with predictable timelines and real-time visibility.</p>
            <div class="hero-actions">
                <a class="button-primary" href="{{ url('/quote') }}">Request a Quote</a>
                <a class="button-outline" href="{{ url('/tracking') }}">Track a Shipment</a>
            </div>
        </div>
        <div class="hero-card">
            <h3>Operational Snapshot</h3>
            <p class="muted">Dedicated port team in Mombasa, inland clearance desks in Nairobi, and global agent coverage across Africa, Europe, Asia, and North America.</p>
            <div class="stats">
                <div class="stat">
                    <strong>24/7</strong>
                    <span>Monitoring desk</span>
                </div>
                <div class="stat">
                    <strong>48 hrs</strong>
                    <span>Average clearance window</span>
                </div>
                <div class="stat">
                    <strong>95%</strong>
                    <span>On-time sailings</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="panel">
    <div class="container">
        <h2 class="panel-title">Integrated Logistics Services</h2>
        <p class="panel-subtitle">One partner for international shipping, import coordination, and warehousing.</p>
        <div class="cards">
            <div class="card">
                <h3>Overseas Shipping</h3>
                <p>FCL and LCL ocean freight, air freight, and project cargo with proactive sailing schedules and carrier management.</p>
            </div>
            <div class="card">
                <h3>Import Management</h3>
                <p>Customs documentation, compliance checks, and clearance workflows aligned with Kenya Revenue Authority requirements.</p>
            </div>
            <div class="card">
                <h3>Warehousing & Storage</h3>
                <p>Secure inventory holding, bonded storage, and fulfillment staging close to the port and Nairobi distribution corridors.</p>
            </div>
        </div>
    </div>
</section>

<section class="panel">
    <div class="container section-split">
        <div>
            <span class="badge">Why BlueWave</span>
            <h2 class="panel-title">Precision, compliance, and global coverage.</h2>
            <p class="panel-subtitle">We combine disciplined documentation, advanced tracking, and experienced operators to keep your cargo moving.</p>
            <div class="list">
                <div class="list-item">Dedicated account managers for every overseas lane.</div>
                <div class="list-item">Integrated customs brokerage and clearance coordination.</div>
                <div class="list-item">Real-time milestone reporting and exception handling.</div>
            </div>
        </div>
        <div class="card">
            <h3>Kenya to Global Gateways</h3>
            <p class="muted">We manage exports and imports through Mombasa, Jomo Kenyatta International Airport, and inland depots, with vetted partners across Dubai, Shanghai, Rotterdam, and New York.</p>
            <p class="muted">Our warehousing network supports temperature-controlled and high-security goods with scalable storage plans.</p>
        </div>
    </div>
</section>
@endsection
