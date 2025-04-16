<?php

use App\Models\Category;
use App\Models\User;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin/category', function () {
    $cats = Category::withCount('products')->paginate(5);
    return view('category', ['cats' => $cats]);
});
Route::get('admin/category/show', function () {
    return 'sdf';
})->name('category.show');
Route::get('admin/category/edit', function () {
    return 'sdf';
})->name('category.edit');;
Route::get('/auth', function () {
    return view('Auth');
});

// form
Route::post('/category', function (Request $request) {
    $validData = $request->validate(['name' => 'required|min:15', "description" => 'required|min:50']);
    CategoryService::store($validData);
    return redirect()->back();
});
Route::delete('/category', function (Request $request) {})->name('category.destroy');;
Route::post('/auth', function (Request $request) {
    $validData = $request->validate(['email' => 'email|required', "password" => 'required']);

    $user = User::where('email', $validData['email'])->first();
    if ($user && $validData['password'] === "shop2015" && $validData['email'] === "admin@shop.com") {
        return redirect('/admin/category');
    } else {
        return redirect('/auth');
    }
})->name('auth');
