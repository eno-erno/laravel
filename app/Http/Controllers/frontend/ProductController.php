<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\HomeModel;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $data = [
            'category'        => HomeModel::get_category_one(),
            'product'         => HomeModel::get_product(),
            'product_image'   => HomeModel::get_product_image(),
            'category'        => HomeModel::category()
        ];
        return view('frontend/pages/product',$data);
    }
    public function detail_cart(){
        return view('frontend/pages/details');
    }
    public function detail_produk($code){
        $result = HomeModel::detail_products($code);
        if($result){
            $category = HomeModel::category_product($result->category_product_id);
            $_data = [
                'data'      => $result,
                'product'   => $category,
                'product_image'     => HomeModel::get_product_image()
            ];
            return view('frontend/pages/detail_produk',$_data);
        }else{
            return abort(404);
        }
        
    }
    public function kategori($id){
        $category = HomeModel::category_product($id);
        
        if($category){
            $data = [
                'product_image'     => HomeModel::get_product_image(),
                'category'          => HomeModel::category(),
                'product'           => $category,
                'title'             => HomeModel::category($id)
            ];
            return view('frontend/pages/kategori',$data);
        }else{
            return abort(404);
        }
    }
    public function pesanan(Request $request){
        $qty = $request->input('qty');
        $id = $request->input('id');
        $datas = [];
        $users = [
            'name' => $request->input('nama'),
            'email' => $request->input('email')
        ];
        $usersId = DB::table('users')->insertGetId($users);
        
        $member = [
            'user_id' => $usersId,
            'no_telpn' => $request->input('tlp'),
            'address' => $request->input('alamat')
        ];
        $insertMamber = DB::table('members')->insertGetId($member);
        $code = 'PO'.$this->order_code(10);
        $orders = [
            'member_id' => $insertMamber,
            'order_code' => $code,
            'total_price' => $request->input('total'),
            'delivery_status' => 0,
            'catatan_pesanan' => $request->input('notes')
        ];
        $insertOrders = DB::table('orders')->insertGetId($orders);
         
        foreach($id as $key => $rows){
            $data = array(
                'product_id'=> $rows,
                'quantity'=>$qty[$key],
                'order_id' => $insertOrders
            );
            array_push($datas, $data);
        }
        $insertOrdersDetail = DB::table('order_detail')->insert($datas);
        if($insertOrdersDetail){
            return response()->json([
                "status" => 200,
                "message" => "Berhasil melakukan pemesanan"
            ]);
        }else{
            return response()->json([
                "status" => 400,
                "message" => "Gagal melakukan pemesanan"
            ]);
        }
    }
    public function order_code($code){
        $permitted_chars = '0123456789QWERTYUIOPLKJHGFDSAZXCVBNM';
        return substr(str_shuffle($permitted_chars), 0, $code);
    }
}
