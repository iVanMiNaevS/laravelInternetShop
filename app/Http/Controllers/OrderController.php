<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getAll(Request $request)
    {
        $orders = Order::with('product')->get();

        return response()->json(['data' => $orders], 200);
    }
}
