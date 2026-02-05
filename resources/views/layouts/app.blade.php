<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'BlueWave Shipping')</title>
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    <div class="page">
        <header class="site-header">
            <div class="container header-inner">
                <a class="brand" href="{{ url('/') }}">
                    <span class="brand-mark"></span>
                    <div class="brand-text">
                        <span class="brand-name">BlueWave Shipping</span>
                        <span class="brand-tag">Kenya • Overseas Logistics</span>
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
                    <div class="footer-brand">BlueWave Shipping Ltd</div>
                    <p class="muted">Kenya-based logistics partner for overseas shipping, import management, and secure warehousing.</p>
                </div>
                <div>
                    <div class="footer-title">Operations</div>
                    <p class="muted">Nairobi HQ • Mombasa Port Desk</p>
                    <p class="muted">Mon–Sat: 08:00–18:00 EAT</p>
                </div>
                <div>
                    <div class="footer-title">Contact</div>
                    <p class="muted">+254 700 000 000</p>
                    <p class="muted">ops@bluewaveshipping.co.ke</p>
                </div>
            </div>
            <div class="container footer-bottom">
                <span>© {{ date('Y') }} BlueWave Shipping Ltd. All rights reserved.</span>
                <span>Licensed for international freight forwarding & customs brokerage.</span>
            </div>
        </footer>
    </div>
</body>
</html>
