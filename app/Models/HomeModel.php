<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeModel extends Model
{
    // use HasFactory;
    protected $table = 'banner_sliders';

    public static function get_category_one(){
        return DB::table('category_products')
                    ->get();
    }

    public static function get_product_home(){
        return DB::table('products')
                    ->orderBy('popular_product', 'desc')
                    ->inRandomOrder()
                    ->limit(20)
                    ->get();
    }
    public static function get_product(){
        return DB::table('products')
                    ->orderBy('popular_product', 'desc')
                    ->inRandomOrder()
                    ->paginate(15);
    }
    
    public static function get_product_image(){
        return DB::table('product_images')
                    ->get();
    }
    public static function detail_products($code){
        return DB::table('products')
                    ->where('kode_produk','=',$code)
                    ->first();
    }
    public static function category($id =null){
        if($id == null){
            return DB::table('category_products')
                    ->get();
        }else{
            return DB::table('category_products')
                    ->where('id','=',$id)
                    ->first();
        }
        
    }
    public static function category_product($id){
        return DB::table('products')
            ->join('category_products', 'category_products.id', '=', 'products.category_product_id')
            ->select('products.*')
            ->where('category_products.id','=',$id)
            ->paginate(15);
    }
    
}
