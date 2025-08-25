<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
//Welcome route
Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');
//Dasboard route
Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Venta index route, si el ususario es autenticado se redirige a esta dirección 
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create_product'])->name('products.create_product');
    Route::post('/products', [ProductController::class, 'store_product'])->name('products.store');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';