<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\GalleryController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
