<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/search', function () {
        return view('search-page');
    });

    Route::get('/notification', function () {
        return view('notification');
    });

    Route::get('/transaction', function () {
        return view('transaction');
    });

    Route::get('/cart', function () {
        return view('cart.cart');
    });

    Route::get('/cart/detail-product', function () {
        return view('cart.detail-product');
    });

    Route::get('/cart/checkout', function () {
        return view('cart.checkout');
    });
    Route::get('/cart/checkout/payment', function () {
        return view('cart.payment.payment');
    });

    Route::get('/cart/checkout/confirm', function () {
        return view('cart.payment.confirm-payment');
    });

    Route::get('/cart/checkout/success', function () {
        return view('cart.payment.success');
    });

    Route::get('/profile', function () {
        return view('profile');
    });

    Route::get('/profile/settings', function () {
        return view('settings');
    });
});

require __DIR__.'/auth.php';