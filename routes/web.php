<?php

use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Models\Review;
use App\Http\Controllers\QuickRequestController;
use App\Http\Controllers\BookingRequestController;

Route::get('/', function () {
    $services = Service::query()
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();
    return view('pages.home', compact('services'));
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
