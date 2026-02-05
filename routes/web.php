<?php

use Illuminate\Support\Facades\Route;
use App\Models\Service;

Route::view('/', 'pages.home');
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
