<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/produk/{product}', [LandingController::class, 'show'])->name('landing.show');

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/products', [AdminController::class, 'index'])->name('admin.products.index');
Route::get('/admin/products/create', [AdminController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products', [AdminController::class, 'store'])->name('admin.products.store');
Route::get('/admin/products/{product}/edit', [AdminController::class, 'edit'])->name('admin.products.edit');
Route::put('/admin/products/{product}', [AdminController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/{product}', [AdminController::class, 'destroy'])->name('admin.products.destroy');
