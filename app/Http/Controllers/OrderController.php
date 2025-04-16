<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getAll(Request $request)
    {
        $orders = Order::with('product')->get();

        return response()->json(['data' => $orders], 200);
    }
    public function webhook(Request $request)
    {
        $validData = $request->validate(['order_id' => 'number|required', 'status' => 'string']);
        try {
            Order::findOrFail($validData['order_id'])->update(['status' => $validData['status']]);
        } catch (ModelNotFoundException  $th) {
            return response()->json(['message' => 'Order not found'], 400);
        }
        return response()->noContent();
    }
}
