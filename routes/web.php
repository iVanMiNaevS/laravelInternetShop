<?php

use App\Http\Controllers\Web\AuthControllerWeb;
use App\Http\Controllers\Web\CategoryControllerWeb;
use App\Http\Controllers\Web\ProductControllerWeb;
use App\Models\Category;
use App\Models\User;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AuthControllerWeb::class, 'index'])->name('admin.index');
Route::post('/admin/login', [AuthControllerWeb::class, 'store'])->name('admin.store');


Route::get('/admin/category', [CategoryControllerWeb::class, 'index'])->name('category.index')->middleware('auth:sanctum');
Route::get('/admin/category/create', [CategoryControllerWeb::class, 'getCreate'])->name('category.getCreate')->middleware('auth:sanctum');
Route::post('/admin/category/create', [CategoryControllerWeb::class, 'store'])->name('category.store')->middleware('auth:sanctum');
Route::get('/admin/category/{category}', [CategoryControllerWeb::class, 'show'])->name('category.show')->middleware('auth:sanctum');
Route::get('/admin/category/{category}/edit', [CategoryControllerWeb::class, 'getUpdate'])->name('category.getUpdate')->middleware('auth:sanctum');
Route::put('/admin/category/{category}/edit', [CategoryControllerWeb::class, 'update'])->name('category.update')->middleware('auth:sanctum');
Route::delete('/admin/category/{category}', [CategoryControllerWeb::class, 'delete'])->name('category.destroy')->middleware('auth:sanctum');

Route::get('admin/products/create', [ProductControllerWeb::class, 'getCreate'])->name('products.getCreate');
Route::post('admin/products/create', [ProductControllerWeb::class, 'create'])->name('products.store');
Route::get('admin/products/{product}', [ProductControllerWeb::class, 'show'])->name('products.show');
Route::get('admin/products/{product}/edit', [ProductControllerWeb::class, 'getUpdate'])->name('products.getEdit');
Route::put('admin/products/{product}/edit', [ProductControllerWeb::class, 'update'])->name('products.edit');
Route::delete('admin/products/{product}', [ProductControllerWeb::class, 'delete'])->name('products.destroy');
