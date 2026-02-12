@extends('layouts.app')

@section('title', 'Client Reviews | Anzunzu Shipping')
@section('meta_description', 'What previous clients say about Anzunzu: accountable teams, disciplined timelines, and clear documentation.')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">Client Reviews</span>
            <h1>What our clients say.</h1>
            <p>Real feedback from importers and exporters working with our shipping, clearance, and warehousing teams in Kenya.</p>
        </div>
        <div class="hero-card">
            <h3>Review Policy</h3>
            <p class="muted">Reviews are verified and published by our operations team. Only clients with completed shipments and storage contracts may submit feedback.</p>
        </div>
    </div>
    </section>

<section class="panel">
    <div class="container">
        <div class="cards">
            @forelse($reviews as $review)
                <div class="card" style="animation: slideIn 0.6s ease both;">
                    <h3>{{ $review->client_name }}</h3>
                    <p class="muted" style="margin-bottom: 8px;">
                        @for($i = 0; $i < (int) $review->rating; $i++)
                            ★
                        @endfor
                        @for($i = (int) $review->rating; $i < 5; $i++)
                            ☆
                        @endfor
                    </p>
                    <p>{{ $review->comment }}</p>
                    @if($review->published_at)
                        <p class="muted" style="margin-top: 12px;">Published {{ $review->published_at->diffForHumans() }}</p>
                    @endif
                </div>
            @empty
                <div class="card">
                    <h3>Coming soon</h3>
                    <p>We are compiling verified reviews from completed client engagements. Please check back shortly.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
