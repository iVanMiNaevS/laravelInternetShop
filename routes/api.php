<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/registration', [AuthController::class, 'registration']);
Route::post('/auth', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/categories', [CategoryController::class, 'getAll'])->middleware('auth:sanctum');


Route::get('/categories/{category_id}/products', [ProductController::class, 'getByCategory'])->middleware('auth:sanctum');
Route::get('/products/{product_id}', [ProductController::class, 'getOne'])->middleware('auth:sanctum');
Route::post('/products/{product_id}/buy', [ProductController::class, 'buy'])->middleware('auth:sanctum');

Route::get('/orders', [OrderController::class, 'getAll'])->middleware('auth:sanctum');
