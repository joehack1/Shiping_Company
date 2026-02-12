@extends('layouts.app')

@section('title', 'Anzunzu Commercial Exports')
@section('meta_description', 'Fast & secure services with tracking, secure packaging, affordable rates, customs clearance assistance, and dedicated support.')

@section('content')
<section class="hero-slider">
    <div class="slider-track">
        <div class="slide is-active">
            <img src="{{ asset('assets/aerial-view-cargo-ship-with-cargo-container-sea.jpg') }}" alt="Container vessel at sea">
            <div class="slide-overlay"></div>
            <div class="slide-content container">
                <span class="badge">Fast Parcel Delivery</span>
                <h1>Fast & secure serices.</h1>
                <p>Timely deliveries with real-time tracking, secure packaging, and affordable rates across shipment sizes.</p>
                <div class="hero-actions">
                    <a class="button-primary" href="{{ url('/quote') }}">Request a Quote</a>
                    <a class="button-outline" href="{{ url('/tracking') }}">Track a Shipment</a>
                </div>
            </div>
        </div>
        <div class="slide">
            <img src="{{ asset('assets/shipping-containers-being-loaded-by-crane-port.jpg') }}" alt="Port crane loading containers">
            <div class="slide-overlay"></div>
            <div class="slide-content container">
                <span class="badge">Customs Assistance</span>
                <h1>Smooth customs clearance.</h1>
                <p>Guidance and processing support for international shipments to ensure a hassle-free delivery experience.</p>
                <div class="hero-actions">
                    <a class="button-primary" href="{{ url('/importing') }}">Import Services</a>
                    <a class="button-outline" href="{{ url('/contact') }}">Speak to a Specialist</a>
                </div>
            </div>
        </div>
        <div class="slide">
            <img src="{{ asset('assets/shipping-containers-port-sunset.jpg') }}" alt="Container port at sunset">
            <div class="slide-overlay"></div>
            <div class="slide-content container">
                <span class="badge">Affordable Rates</span>
                <h1>Competitive pricing for all sizes.</h1>
                <p>Flexible options for small parcels to bulk orders, optimized for speed and safety.</p>
                <div class="hero-actions">
                    <a class="button-primary" href="{{ url('/warehousing') }}">View Warehousing</a>
                    <a class="button-outline" href="{{ url('/quote') }}">Storage Quote</a>
                </div>
            </div>
        </div>
        <div class="slide">
            <img src="{{ asset('assets/jumbo-jet-flying-sky.jpg') }}" alt="Cargo aircraft in flight">
            <div class="slide-overlay"></div>
            <div class="slide-content container">
                <span class="badge">Customer Support</span>
                <h1>Dedicated updates every step.</h1>
                <p>We keep you informed from dispatch to delivery, with live status and responsive support.</p>
                <div class="hero-actions">
                    <a class="button-primary" href="{{ url('/shipping') }}">Air & Ocean Freight</a>
                    <a class="button-outline" href="{{ url('/services') }}">All Services</a>
                </div>
            </div>
        </div>
        <div class="slide">
            <img src="{{ asset('assets/3d-cartoon-airplane-sky.jpg') }}" alt="Aircraft illustration">
            <div class="slide-overlay"></div>
            <div class="slide-content container">
                <span class="badge">Client Support</span>
                <h1>Dedicated account managers for every lane.</h1>
                <p>We stay on call from booking to delivery with precise reporting and exception handling.</p>
                <div class="hero-actions">
                    <a class="button-primary" href="{{ url('/about') }}">About BlueWave</a>
                    <a class="button-outline" href="{{ url('/contact') }}">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="slide">
            <img src="https://images.unsplash.com/photo-1543246086-1b78c93666f3?q=80&w=1920&auto=format&fit=crop" alt="Aerial view of container ship">
            <div class="slide-overlay"></div>
            <div class="slide-content container">
                <span class="badge">On-Time Delivery</span>
                <h1>On-time delivery, every time.</h1>
                <p>We align operations for reliable timelines and a smooth, hassle-free shipping experience.</p>
                <div class="hero-actions">
                    <a class="button-primary" href="{{ url('/services') }}">Explore Services</a>
                    <a class="button-outline" href="{{ url('/quote') }}">Get a Quote</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-controls container">
        <button class="slider-dot is-active" type="button" aria-label="Slide 1"></button>
        <button class="slider-dot" type="button" aria-label="Slide 2"></button>
        <button class="slider-dot" type="button" aria-label="Slide 3"></button>
        <button class="slider-dot" type="button" aria-label="Slide 4"></button>
        <button class="slider-dot" type="button" aria-label="Slide 5"></button>
        <button class="slider-dot" type="button" aria-label="Slide 6"></button>
    </div>
</section>

<section class="panel">
    <div class="container">
        <h2 class="panel-title">Operational Snapshot</h2>
        <p class="panel-subtitle">Dedicated port teams in Mombasa, inland clearance desks in Nairobi, and global agent coverage.</p>
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
    <div class="container">
        <h2 class="panel-title">Quick Request</h2>
        <p class="panel-subtitle">Instant reply: enter your details and select services needed.</p>
        <form id="quick-request-form">
            <div class="form-grid">
                <div>
                    <label for="qr_phone">Phone Number</label>
                    <input id="qr_phone" name="phone" type="tel" placeholder="+254 700 000 000" required>
                </div>
                <div>
                    <label for="qr_email">Email</label>
                    <input id="qr_email" name="email" type="email" placeholder="name@company.com" required>
                </div>
            </div>
            <div style="margin-top: 14px;">
                <label>Services Needed</label>
                <div class="list" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
                    @foreach(($services ?? collect()) as $svc)
                        <label class="list-item" style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" name="service_ids[]" value="{{ $svc->id }}">
                            <span>{{ $svc->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-actions">
                <button class="button-primary" type="submit">Send Request</button>
            </div>
            <p id="qr_status" class="muted" style="margin-top: 10px;"></p>
        </form>
    </div>
    <script>
        (function () {
            const form = document.getElementById('quick-request-form');
            const statusEl = document.getElementById('qr_status');
            if (!form) return;
            form.addEventListener('submit', async function (e) {
                e.preventDefault();
                statusEl.textContent = '';
                const fd = new FormData(form);
                const payload = {
                    phone: fd.get('phone'),
                    email: fd.get('email'),
                    service_ids: Array.from(form.querySelectorAll('input[name=\"service_ids[]\"]:checked')).map(i => parseInt(i.value, 10))
                };
                try {
                    const res = await fetch('{{ route('quick-request.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(payload)
                    });
                    const data = await res.json();
                    if (data && data.ok) {
                        statusEl.textContent = data.message || 'Instant reply: request received.';
                        form.reset();
                    } else {
                        statusEl.textContent = 'Please try again.';
                    }
                } catch (err) {
                    statusEl.textContent = 'Please try again.';
                }
            });
        })();
    </script>
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

<script>
    const slides = Array.from(document.querySelectorAll('.hero-slider .slide'));
    const dots = Array.from(document.querySelectorAll('.hero-slider .slider-dot'));
    let currentIndex = 0;
    let timerId = null;

    const activateSlide = (index) => {
        slides.forEach((slide, idx) => {
            slide.classList.toggle('is-active', idx === index);
            slide.classList.toggle('is-exiting', idx === currentIndex && idx !== index);
        });
        dots.forEach((dot, idx) => dot.classList.toggle('is-active', idx === index));
        currentIndex = index;
    };

    const nextSlide = () => {
        const nextIndex = (currentIndex + 1) % slides.length;
        activateSlide(nextIndex);
    };

    const resetTimer = () => {
        if (timerId) {
            window.clearInterval(timerId);
        }
        timerId = window.setInterval(nextSlide, 6000);
    };

    dots.forEach((dot, idx) => {
        dot.addEventListener('click', () => {
            activateSlide(idx);
            resetTimer();
        });
    });

    resetTimer();
</script>
@endsection
