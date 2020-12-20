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
            'harga',
            'qty',
            'weight',
            'kode_produk',
            'stock_status',
            'description',
            'diskon_status',
            'diskon',
            'thumbnail',
            'popular_product',
            'created_at'
    ];
}
