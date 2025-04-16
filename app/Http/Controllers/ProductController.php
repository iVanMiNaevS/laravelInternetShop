<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        // $response = Http::post('url', ['price' => $product->price, 'webhook_url' => 'http://localhost:8000/payment-webhook']);
        $response = ['pay_url' => 'url', 'order_id' => 1];
        return response()->json(['pay_url' => $response['pay_url']], 200);
    }
}
