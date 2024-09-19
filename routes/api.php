<?php
use App\Http\Controllers\ProductController;


Route::get('/api/products', [ProductController::class, 'getProducts']);
Route::get('/api/product/{id}', [ProductController::class, 'getProductDetail']);