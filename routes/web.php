<?php

use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/category', function () {
    $cats = CategoryService::all();
    return view('category', ['cats' => $cats]);
});

// form
Route::post('/category', function (Request $request) {
    $validData = $request->validate(['name' => 'required|min:15', "description" => 'required|min:50']);
    CategoryService::store($validData);
    return redirect()->back();
});
