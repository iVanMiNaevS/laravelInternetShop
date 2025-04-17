<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image_url'
    ];
    protected $hidden = ['created_at', 'updated_at', 'category_id'];
}
