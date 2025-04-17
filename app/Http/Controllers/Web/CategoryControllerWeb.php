<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryControllerWeb extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('products')->paginate(5);

        return view('/category/category', ['cats' => $categories]);
    }
    public function getUpdate(Category $category)
    {
        return view('/category/category-edit', ['category' => $category]);
    }
    public function update(Category $category, Request $request)
    {
        $validData = $request->validate(['name' => 'string|required', 'description' => 'string|required|min:50']);
        CategoryService::update($category, $validData);
        return redirect('/admin/category');
    }
    public function delete(Category $category)
    {
        CategoryService::destroy($category);
        return redirect()->back();
    }
    public function show(Category $category)
    {
        return view('/category/category-show', ['category' => $category]);
    }
    public function store(Request $request)
    {
        $validData = $request->validate(['name' => 'string|required', 'description' => 'string|required|min:50']);

        CategoryService::store($validData);
        return redirect()->route('category.index');
    }
    public function getCreate(Request $request)
    {
        return view('/category/category-create');
    }
}
