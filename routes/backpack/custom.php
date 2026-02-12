<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActivityLogCrudController;
use App\Http\Controllers\Admin\QuoteCrudController;
use App\Http\Controllers\Admin\ServiceCrudController;
use App\Http\Controllers\Admin\ReviewCrudController;
use App\Http\Controllers\Admin\InvoiceCrudController;
use App\Http\Controllers\Admin\SystemLogController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
], function () { // custom admin routes
    Route::crud('service', ServiceCrudController::class);
    Route::crud('quote', QuoteCrudController::class);
    Route::crud('review', ReviewCrudController::class);
    Route::crud('invoice', InvoiceCrudController::class);
    Route::get('invoice/{id}/pdf', [InvoiceCrudController::class, 'pdf'])->name('invoice.pdf');
    Route::crud('activity-log', ActivityLogCrudController::class);
    Route::get('system-logs', [SystemLogController::class, 'index'])->name('system-logs');
}); // this should be the absolute last line of this file
