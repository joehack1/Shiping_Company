@extends('layouts.app')

@section('title', 'Image Gallery | Anzunzu Commercial Exports')
@section('meta_description', 'Browse our shipping image gallery showing cargo handling, dispatch, logistics operations, and deliveries.')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="badge">Image Gallery</span>
            <h1>Moments from our shipping operations.</h1>
            <p>Browse photos from handling, dispatch, warehousing, and delivery activities across our service routes.</p>
        </div>
        <div class="hero-card">
            <h3>Gallery Updates</h3>
            <p class="muted">New photos are pulled automatically from our internal image folder and published here.</p>
        </div>
    </div>
</section>

<section class="panel">
    <div class="container">
        @if(($galleryFiles ?? collect())->isNotEmpty())
            <div class="gallery-page-grid">
                @foreach($galleryFiles as $galleryFile)
                    <figure class="gallery-page-item">
                        <img src="{{ $galleryFile['url'] }}" alt="Shipping gallery image {{ $loop->iteration }}">
                    </figure>
                @endforeach
            </div>
        @else
            <div class="card">
                <h3>No images yet</h3>
                <p class="muted">Add files to <code>resources/images</code> and refresh this page.</p>
            </div>
        @endif
    </div>
</section>
@endsection
