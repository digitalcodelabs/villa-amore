<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');

// Gallery route must come before the catch-all route
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Catch-all route for dynamic pages (must be last)
Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');