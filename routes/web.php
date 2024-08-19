<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Product\ProductController::class, 'index'])->name('home');

Route::prefix('/product')
    ->controller(App\Http\Controllers\Product\ProductController::class)
    ->as('product.')
    ->group(function (){
       Route::get('/', 'index')->name('index');
       Route::get('/{slug}', [\App\Http\Controllers\Product\ProductController::class, 'show'])->name('show');

    });


Route::prefix('/cart')
    ->group(function() {
        Route::get('/', \App\Http\Controllers\Cart\ShowCartController::class)->name('cart');
        Route::post('/{product}', \App\Http\Controllers\Cart\StoreCartProduct::class)->name('product.cart');
        Route::delete('/{product}', \App\Http\Controllers\Cart\DestroyCartProductController::class)->name('product.cart.destroy');
    });



Route::prefix('/checkout')
    ->group(function() {
        Route::post('/', \App\Http\Controllers\Product\CheckoutController::class)->name('checkout');
        Route::get('/success', function (\Illuminate\Http\Request $request) {
            \Illuminate\Support\Facades\Session::forget('cart');
            return redirect()->route('home');
        })->name('checkout.success');

        Route::get('/cancel', function (\Illuminate\Http\Request $request) {
            \Illuminate\Support\Facades\Session::forget('cart');
            return redirect()->route('home');
        })->name('checkout.cancel');
    });



Route::post('/webhook', \App\Http\Controllers\WebhookController::class);
