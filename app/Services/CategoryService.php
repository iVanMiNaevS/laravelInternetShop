<?php
// app/Services/PostService.php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Collection;

class CategoryService
{
    static function all(): Collection
    {
        return Category::all();
    }

    static function store(array $data)
    {
        return Category::create($data);
    }

    static function update(Category $post, array $data)
    {
        $post->update($data);
        return $post;
    }

    static function destroy(Category $post)
    {
        $post->delete();
    }
}
