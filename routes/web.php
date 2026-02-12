<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Models\Service;
use App\Models\Review;
use App\Http\Controllers\QuickRequestController;
use App\Http\Controllers\BookingRequestController;
use App\Http\Controllers\ChatController;

/**
 * Build the gallery file list from resources/images.
 */
$getGalleryFiles = function () {
    return collect(File::files(resource_path('images')))
        ->filter(function ($file) {
            return in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp', 'gif', 'avif'], true);
        })
        ->sortBy(function ($file) {
            return strtolower($file->getFilename());
        })
        ->values()
        ->map(function ($file) {
            return [
                'name' => $file->getFilename(),
                'url' => route('gallery.image', ['image' => $file->getFilename()]),
            ];
        })
        ->values();
};

Route::get('/gallery-image/{image}', function ($image) {
    $galleryRoot = realpath(resource_path('images'));
    $requestedPath = realpath(resource_path('images' . DIRECTORY_SEPARATOR . $image));

    if (!$galleryRoot || !$requestedPath || !str_starts_with($requestedPath, $galleryRoot . DIRECTORY_SEPARATOR) || !is_file($requestedPath)) {
        abort(404);
    }

    $extension = strtolower(pathinfo($requestedPath, PATHINFO_EXTENSION));
    if (!in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'avif'], true)) {
        abort(404);
    }

    return response()->file($requestedPath);
})->where('image', '.*')->name('gallery.image');

Route::get('/', function () use ($getGalleryFiles) {
    $services = Service::query()
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();
    $galleryFiles = $getGalleryFiles();

    return view('pages.home', compact('services', 'galleryFiles'));
});
Route::get('/gallery', function () use ($getGalleryFiles) {
    $galleryFiles = $getGalleryFiles();
    return view('pages.gallery', compact('galleryFiles'));
});
Route::view('/about', 'pages.about');
Route::get('/services', function () {
    $services = Service::query()
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();

    return view('pages.services', compact('services'));
});
Route::view('/shipping', 'pages.shipping');
Route::view('/importing', 'pages.importing');
Route::view('/warehousing', 'pages.warehousing');
Route::view('/tracking', 'pages.tracking');
Route::view('/quote', 'pages.quote');
Route::view('/contact', 'pages.contact');
Route::get('/reviews', function () {
    $reviews = Review::query()
        ->where('is_published', true)
        ->orderByDesc('published_at')
        ->orderByDesc('created_at')
        ->take(24)
        ->get();
    return view('pages.reviews', compact('reviews'));
});
Route::post('/quick-request', [QuickRequestController::class, 'store'])->name('quick-request.store');
Route::post('/book-service', [BookingRequestController::class, 'store'])->name('book-service.store');
Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
