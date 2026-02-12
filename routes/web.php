<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// SEKSI B - Landing Page (Frontend)
Route::name('landing.')->group(function (): void {
    Route::get('/', [LandingController::class, 'index'])->name('index');
    Route::get('/produk/{product}', [LandingController::class, 'show'])->name('show');
});

// SEKSI A - Admin Panel (Backend)
Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/products', [AdminController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminController::class, 'destroy'])->name('products.destroy');
});
