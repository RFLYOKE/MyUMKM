<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
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

    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');

    //Keranajang
    Route::get('/cart', [KeranjangController::class, 'show'])->name('cart.show');
    Route::post('/cart', [KeranjangController::class, 'create'])->name('cart.create');
    Route::put('/cart/{keranjang}', [KeranjangController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{keranjang}', [KeranjangController::class, 'destroy'])->name('cart.destroy');
    Route::get('/cart/detail-product/{id}', [ProdukController::class, 'show'])->name('produk.detail');

    Route::get('/cart/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/cart/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/cart/checkout/payment/{id}', [PaymentController::class, 'show'])->name('payment.show');

    Route::get('/cart/checkout/confirm-payment/{pesanan}', [PaymentController::class, 'confirmForm'])->name('payment.confirm-form');
    Route::post('/cart/checkout/confirm-payment/{pesanan}', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/cart/checkout/success', [PaymentController::class, 'success'])->name('payment.success');

    Route::get('/profile', function () {
        return view('profile');
    });

    Route::get('/profile/settings', function () {
        return view('settings');
    });
});

require __DIR__.'/auth.php';