<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\ProductController;

Route::get('/ping', function () {
    return response()->json(['message' => 'API is working!']);
});
Route::get('/brands', [BrandController::class, 'index']);
Route::get('/brands/{brand}/products', [ProductController::class, 'byBrand']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
