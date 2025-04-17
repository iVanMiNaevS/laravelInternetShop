<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductsService;
use Illuminate\Http\Request;

class ProductControllerWeb extends Controller
{
    public function show(Product $product)
    {
        return view('/product/product-show', ['product' => $product]);
    }
    public function getUpdate(Product $product)
    {
        return view('/product/product-edit', ['product' => $product]);
    }
    public function getCreate()
    {
        $categories = CategoryService::all();
        return view('product/product-create', ['categories' => $categories]);
    }
    public function create(Request $request)
    {
        $validData = $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'price' => 'string|required',
            'image_url' => 'image',
            'category_id' => 'string|required'
        ]);
        ProductsService::store($validData);
        return redirect('/admin/category/' . $validData['category_id']);
    }
    public function update(Product $product, Request $request)
    {
        $validData = $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'price' => 'string|required',
            'image_url' => 'image'
        ]);
        ProductsService::update($product, $validData);
        return redirect('/admin/category/' . $product->category_id);
    }
    public function destroy(Product $product)
    {
        ProductsService::destroy($product);
        return redirect('/admin/category/' . $product->category_id);
    }
}
