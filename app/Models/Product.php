<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
            'id',
            'category_product_id',
            'brand_id',
            'name',
            'price',
            'qty',
            'weight',
            'sku',
            'stock_status',
            'description',
            'diskon_status',
            'diskon',
            'created_at'
    ];
}
