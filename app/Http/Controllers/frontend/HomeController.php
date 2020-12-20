<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\HomeModel;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'banner'    => HomeModel::where('status','=',1)->orWhere('pages', '=', 'HOME')->first(),
            'category'  => HomeModel::get_category_one(),
            'product'   => HomeModel::get_product_home(),
            'product_image'   => HomeModel::get_product_image(),
        ];
        // dd($data);
        return view('frontend/pages/home',$data);
    }

    
}
