<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home');
Route::view('/about', 'pages.about');
Route::view('/services', 'pages.services');
Route::view('/shipping', 'pages.shipping');
Route::view('/importing', 'pages.importing');
Route::view('/warehousing', 'pages.warehousing');
Route::view('/tracking', 'pages.tracking');
Route::view('/quote', 'pages.quote');
Route::view('/contact', 'pages.contact');
