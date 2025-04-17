<?php
// app/Services/PostService.php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductsService
{
    static function all(): Collection
    {
        return Product::all();
    }

    static function store(array $data)
    {
        return Product::create($data);
    }

    static function update(Product $post, array $data)
    {
        $post->update($data);
        return $post;
    }

    static function destroy(Product $post)
    {
        $post->delete();
    }
}
