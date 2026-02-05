@extends('layouts.app')

@section('title', 'Request Quote | BlueWave Shipping')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">Request a Quote</span>
            <h1>Tell us about your shipment or storage needs.</h1>
            <p>We respond within one business day with a detailed cost breakdown and timeline.</p>
        </div>
        <div class="hero-card">
            <h3>Quote Request</h3>
            <form>
                <div class="form-grid">
                    <div>
                        <label for="service">Service Type</label>
                        <select id="service">
                            <option>Overseas Shipping</option>
                            <option>Import Management</option>
                            <option>Warehousing & Storage</option>
                            <option>Project Cargo</option>
                        </select>
                    </div>
                    <div>
                        <label for="origin">Origin Country</label>
                        <input id="origin" type="text" placeholder="China">
                    </div>
                    <div>
                        <label for="destination">Destination</label>
                        <input id="destination" type="text" placeholder="Kenya">
                    </div>
                    <div>
                        <label for="weight">Estimated Weight (kg)</label>
                        <input id="weight" type="text" placeholder="1500">
                    </div>
                </div>
                <div style="margin-top: 12px;">
                    <label for="details">Cargo Details</label>
                    <textarea id="details" placeholder="Type of goods, volume, readiness date"></textarea>
                </div>
                <div class="form-grid" style="margin-top: 12px;">
                    <div>
                        <label for="name">Contact Name</label>
                        <input id="name" type="text" placeholder="Jane Mwangi">
                    </div>
                    <div>
                        <label for="phone">Phone</label>
                        <input id="phone" type="text" placeholder="+254 7xx xxx xxx">
                    </div>
                    <div>
                        <label for="company">Company</label>
                        <input id="company" type="text" placeholder="BlueLine Traders">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input id="email" type="email" placeholder="jane@company.com">
                    </div>
                </div>
                <div class="form-actions">
                    <button class="button-primary" type="button">Submit Quote</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
