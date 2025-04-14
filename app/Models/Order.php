<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
