<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeModel extends Model
{
    // use HasFactory;
    protected $table = 'banner';

    public static function get_category_one(){
        return DB::table('category_products')
                    ->where('parent','=',0)
                    ->limit(4)
                    ->get();
    }
}
