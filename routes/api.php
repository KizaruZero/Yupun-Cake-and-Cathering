<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;


Route::get('/api/products', [ProductController::class, 'getProducts']);
Route::get('/api/category/{id}', [ProductController::class, 'getCategoryProducts']);
Route::get('/api/product/{id}', [ProductController::class, 'getProductDetail']);
Route::get('/api/cart', [ProductController::class, 'viewCart']);

// add auth middleware
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/api/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
    Route::post('/api/cart/update/{id}', [ProductController::class, 'updateCart'])->name('cart.update');
    Route::post('/api/cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/api/orders', [OrderController::class, 'store'])->name('orders.store');
});


