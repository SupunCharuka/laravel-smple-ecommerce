<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// FRONTEND
Route::get('/', [FrontendController::class, 'index'])->name('/');
Route::get('/products', [FrontendController::class, 'products'])->name('products');
Route::get('/product-details', [FrontendController::class, 'productDetails'])->name('productDetails');
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');

