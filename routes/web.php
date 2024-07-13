<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use Illuminate\Support\Facades\Route;

// FRONTEND
Route::get('/', [FrontendController::class, 'index'])->name('/');
Route::get('/products', [FrontendController::class, 'products'])->name('products');
Route::get('/product-details', [FrontendController::class, 'productDetails'])->name('productDetails');
Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');

//ADMIN
Route::group(["prefix" => "admin", 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'has_any_admin_role'], "as" => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::delete('category/{category}', [CategoryController::class, 'destroy']);
});


//User
Route::group(["prefix" => "customer", 'middleware' => ['auth:sanctum', config('jetstream.auth_session'),  'verified', 'role:customer'], "as" => 'customer.'], function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});
