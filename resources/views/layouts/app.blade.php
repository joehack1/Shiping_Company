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
                <nav class="nav">
                    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'active' : '' }}">About</a>
                    <a href="{{ url('/services') }}" class="{{ request()->is('services') ? 'active' : '' }}">Services</a>
                    <a href="{{ url('/shipping') }}" class="{{ request()->is('shipping') ? 'active' : '' }}">Overseas Shipping</a>
                    <a href="{{ url('/importing') }}" class="{{ request()->is('importing') ? 'active' : '' }}">Importing</a>
                    <a href="{{ url('/warehousing') }}" class="{{ request()->is('warehousing') ? 'active' : '' }}">Warehousing</a>
                    <a href="{{ url('/tracking') }}" class="{{ request()->is('tracking') ? 'active' : '' }}">Tracking</a>
                    <a href="{{ url('/reviews') }}" class="{{ request()->is('reviews') ? 'active' : '' }}">Reviews</a>
                    <a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                    <a class="button" href="{{ url('/quote') }}">Request Quote</a>
                </nav>
                <a class="brand brand-right" href="{{ url('/') }}">
                    <img class="brand-logo" src="{{ asset('assets/1.png') }}" alt="Anzunzu Commercial Exports">
                    <div class="brand-text">
                        <span class="brand-name">Anzunzu Commercial Exports</span>
                    </div>
                </a>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="site-footer">
            <div class="container footer-grid">
                <div>
                    <img class="footer-logo" src="{{ asset('assets/1.png') }}" alt="Anzunzu Logo">
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
                <div>
                    <div class="footer-title">Important Links</div>
                    <div class="footer-links">
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ url('/about') }}">About</a>
                        <a href="{{ url('/services') }}">Services</a>
                        <a href="{{ url('/shipping') }}">Overseas Shipping</a>
                        <a href="{{ url('/importing') }}">Importing</a>
                        <a href="{{ url('/warehousing') }}">Warehousing</a>
                        <a href="{{ url('/tracking') }}">Tracking</a>
                        <a href="{{ url('/reviews') }}">Reviews</a>
                        <a href="{{ url('/quote') }}">Request Quote</a>
                        <a href="{{ url('/contact') }}">Contact</a>
                    </div>
                </div>
            </div>
            <div class="container footer-bottom">
                <span>� {{ date('Y') }} Anzunzu Commercial Exports. All rights reserved.</span>
                <span>Delivering excellence, on-time, every time.</span>
            </div>
        </footer>
    </div>
    <script>
        (function () {
            var header = document.querySelector('.site-header');
            var onScroll = function () {
                if (!header) return;
                var s = window.scrollY || document.documentElement.scrollTop;
                header.classList.toggle('is-scrolled', s > 8);
            };
            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
        })();
        (function () {
            var nav = document.querySelector('.nav');
            if (!nav) return;
            var createParticle = function (x, y) {
                var p = document.createElement('div');
                p.className = 'particle';
                var angle = Math.random() * Math.PI * 2;
                var distance = 16 + Math.random() * 24;
                var tx = Math.cos(angle) * distance;
                var ty = Math.sin(angle) * distance;
                p.style.left = x + 'px';
                p.style.top = y + 'px';
                p.style.setProperty('--tx', tx + 'px');
                p.style.setProperty('--ty', ty + 'px');
                p.style.animation = 'explode 500ms ease forwards';
                document.body.appendChild(p);
                setTimeout(function () { if (p && p.parentNode) p.parentNode.removeChild(p); }, 520);
            };
            nav.querySelectorAll('a:not(.button)').forEach(function (a) {
                a.addEventListener('mouseenter', function (e) {
                    var rect = a.getBoundingClientRect();
                    var cx = rect.left + rect.width / 2;
                    var cy = rect.top + rect.height / 2;
                    for (var i = 0; i < 8; i++) createParticle(cx, cy);
                }, { passive: true });
            });
        })();
    </script>
</body>
</html>
