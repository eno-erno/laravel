<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Shipping;
use App\Models\PRoduct;
use Illuminate\Support\Facades\Http;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAll = DB::table('orders')
        ->join('shippings', 'orders.shipping_id', '=', 'shippings.id')
        ->join('statuses', 'orders.status_id', '=', 'statuses.id')
        ->select('*')
        ->get();
        return view('backend/admin/content-pages/order.index', compact('dataAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shipping = Shipping::all();
        $data_produk = Product::all();

        
        $provinceResp = Http::get('https://pro.rajaongkir.com/api/province', [
            'key' => '44a38ba19e7837d9d1b7ddc8bc004630',
        ]);
        $dataProvinsi = $provinceResp->json();

        return view('backend/admin/content-pages/order.create', compact('shipping','data_produk','dataProvinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function price(Request $request)
    {
        $produk = $request->input('produk');
        $produk_id =   DB::table('products')->where('id', $produk)->first();
        $harga = $produk_id->price;

	    $output = '<input type="text" id="harga_satuan" value="'.$harga.'" class="form-control" name="harga_satuan">';
             
	    echo $output;
    }

    public function city_d(Request $request)
    {
        $province = $request->input('province');

        $provinceResp = Http::get('https://pro.rajaongkir.com/api/city?province=$province', [
            'key' => '44a38ba19e7837d9d1b7ddc8bc004630',
        ]);
        $dataCity = $provinceResp->json();

	    
	    $output = '<select class="custom-select form-control mr-sm-2 select2" name="city">';
             
        foreach ($dataCity['rajaongkir']['results'] as $data) {

	        if($data['province_id'] == $province) {
                $output .= '<option value="'.$data['city_id'].'">'.$data['city_name'].'</option>';
            }
        }
	    
	    $output .= '</select>';
	    echo $output;

    }
}
