<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll(Request $request)
    {
        $categories = CategoryService::all();

        return response()->json(['data' => $categories], 200);
    }

    // web.php


}
