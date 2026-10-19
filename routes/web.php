<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', fn() => redirect()->route('products.index'));

Route::resource('products', ProductController::class);


use App\Models\Product;

Route::get('/shop', function () {
    $products = Product::orderBy('created_at', 'desc')->get();
    return view('shop.index', compact('products'));
})->name('shop.index');

use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

use App\Http\Controllers\OrderController;

Route::get('/checkout', [OrderController::class, 'create'])->name('checkout.create');
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');