@extends('layouts.app')

@section('title', 'Contact | BlueWave Shipping')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">Contact Us</span>
            <h1>Connect with our Kenya operations team.</h1>
            <p>Speak with our shipping, import, or warehousing specialists. We respond quickly and stay accountable throughout the shipment lifecycle.</p>
            <div class="list">
                <div class="list-item">Nairobi HQ: Industrial Area, Mombasa Road</div>
                <div class="list-item">Mombasa Port Desk: Port Reitz Corridor</div>
                <div class="list-item">Email: ops@bluewaveshipping.co.ke</div>
            </div>
        </div>
        <div class="hero-card">
            <h3>Send a Message</h3>
            <form>
                <div class="form-grid">
                    <div>
                        <label for="name">Full Name</label>
                        <input id="name" type="text" placeholder="James Otieno">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input id="email" type="email" placeholder="james@company.com">
                    </div>
                    <div>
                        <label for="phone">Phone</label>
                        <input id="phone" type="text" placeholder="+254 7xx xxx xxx">
                    </div>
                    <div>
                        <label for="subject">Subject</label>
                        <input id="subject" type="text" placeholder="Import clearance support">
                    </div>
                </div>
                <div style="margin-top: 12px;">
                    <label for="message">Message</label>
                    <textarea id="message" placeholder="Tell us about your shipment, timelines, or storage needs."></textarea>
                </div>
                <div class="form-actions">
                    <button class="button-primary" type="button">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
