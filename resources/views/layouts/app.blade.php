<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Anzunzu Commercial Exports')</title>
    <meta name="description" content="@yield('meta_description', 'Fast and secure parcel delivery to the U.S. with tracking, secure packaging, affordable rates, customs clearance assistance, and dedicated customer support.')">
    <link rel="canonical" href="{{ request()->url() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', trim($__env->yieldContent('title', 'Anzunzu Commercial Exports')))">
    <meta property="og:description" content="@yield('og_description', trim($__env->yieldContent('meta_description', 'Fast and secure parcel delivery to the U.S. with tracking, secure packaging, affordable rates, customs clearance assistance, and dedicated customer support.')))">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:image" content="@yield('og_image', asset('assets/jumbo-jet-flying-sky.jpg'))">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', trim($__env->yieldContent('title', 'Anzunzu Commercial Exports')))">
    <meta name="twitter:description" content="@yield('og_description', trim($__env->yieldContent('meta_description', 'Fast and secure parcel delivery to the U.S. with tracking, secure packaging, affordable rates, customs clearance assistance, and dedicated customer support.')))">
    <meta name="twitter:image" content="@yield('og_image', asset('assets/jumbo-jet-flying-sky.jpg'))">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    <div class="page">
        <header class="site-header">
            <div class="container header-inner">
                <a class="brand" href="{{ url('/') }}">
                    <img class="brand-logo" src="https://anzunzucommercialexports.com/favicon.ico" alt="Anzunzu Commercial Exports">
                    <div class="brand-text">
                        <span class="brand-name">Anzunzu Commercial Exports</span>
                        <span class="brand-tag">Fast Parcel Delivery to the U.S.</span>
                    </div>
                </a>
                <nav class="nav">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/about') }}">About</a>
                    <a href="{{ url('/services') }}">Services</a>
                    <a href="{{ url('/shipping') }}">Overseas Shipping</a>
                    <a href="{{ url('/importing') }}">Importing</a>
                    <a href="{{ url('/warehousing') }}">Warehousing</a>
                    <a href="{{ url('/tracking') }}">Tracking</a>
                    <a href="{{ url('/reviews') }}">Reviews</a>
                    <a href="{{ url('/contact') }}">Contact</a>
                    <a class="button" href="{{ url('/quote') }}">Request Quote</a>
                </nav>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="site-footer">
            <div class="container footer-grid">
                <div>
                    <div class="footer-brand">Anzunzu Commercial Exports</div>
                    <p class="muted">Fast and secure parcel delivery with real-time tracking and customs clearance assistance.</p>
                </div>
                <div>
                    <div class="footer-title">Operations</div>
                    <p class="muted">Nairobi HQ � Mombasa Port Desk</p>
                    <p class="muted">Mon�Sat: 08:00�18:00 EAT</p>
                </div>
                <div>
                    <div class="footer-title">Contact</div>
                    <p class="muted">+254 700 000 000</p>
                    <p class="muted">ops@bluewaveshipping.co.ke</p>
                </div>
            </div>
            <div class="container footer-bottom">
                <span>� {{ date('Y') }} Anzunzu Commercial Exports. All rights reserved.</span>
                <span>Delivering excellence, on-time, every time.</span>
            </div>
        </footer>
    </div>
</body>
</html>
