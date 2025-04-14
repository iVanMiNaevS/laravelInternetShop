<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getByCategory(string $category_id)
    {
        try {
            $category = Category::findOrFail($category_id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['message' => 'category not found'], 400);
        }
        return response()->json(['data' => $category->products]);
    }
    public function getOne(string $product_id)
    {
        try {
            $product = Product::findOrFail($product_id);
        } catch (ModelNotFoundException  $th) {
            return response()->json(['message' => 'product not found'], 400);
        }
        return response()->json(['data' => $product], 200);
    }

    public function buy(string $product_id)
    {
        try {
            $product = Product::findOrFail($product_id);
        } catch (ModelNotFoundException  $th) {
            return response()->json(['message' => 'product not found'], 400);
        }
        return response()->json(['pay_url' => 'link'], 200);
    }
}
