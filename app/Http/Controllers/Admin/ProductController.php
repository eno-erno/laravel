<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Brand;
use App\Models\Category_product;
use DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $dataAll = Product::all();

       return view('backend/admin/content-pages/products.index', compact('dataAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $dataCategry = Category_product::all();
         $dataBrand = Brand::all();


        return view('backend/admin/content-pages/products.create', compact('dataBrand', 'dataCategry'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = Product::create([
            'name' => $request->input('nama_produk'),
            'category_product_id' => $request->input('kategori'),
            'brand_id' => $request->input('brand'),
            'sku' => $request->input('sku'),
            'qty' => $request->input('qty'),
            'weight' => $request->input('berat'),
            'stock_status' => $request->input('status_stok'),
            'description' => $request->input('keterangan'),
            'price' => $request->input('price'),
            'diskon' => $request->input('diskon') == "" ? "0" : $request->input('diskon'),
            'diskon_status' => $request->input('status_diskon') == "" ? "0" : $request->input('status_diskon'),
        ]);

        $id_produk = $data->id;

        $resorceImages = $request->file('images');         
        foreach ($resorceImages as $value) {

            if ($request->hasFile('images')) {
                $resorce = $resorceImages;
                $name   = $value->getClientOriginalName();
                $value->move(\base_path() . "/public/images-produk", $name);
                $path = asset('/images-produk/'.$name);
                
                $save = Product_image::create([
                    'product_id' => $id_produk,
                    'thumbnail' => $path
                ]);   
            } 
        }

        return redirect('/admin/product')->with(['success' => 'Data Berhasil di Tambahkan']);

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
        $dataCategry = Category_product::all();
        $dataBrand = Brand::all();
        $dataProduct = Product::find($id);
        $detail_product = DB::table('product_images')->where('product_id', $id)->get();

        return view('backend/admin/content-pages/products.update', compact('dataBrand', 'dataCategry', 'dataProduct', 'detail_product'));
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

        $post = new Product();
        $post = Product::find($id);

       if ($request->hasFile('images')) {

            $resorceImages = $request->file('images');   

            foreach ($resorceImages as $value) {
                $resorce = $resorceImages;
                $name   = $value->getClientOriginalName();
                $value->move(\base_path() . "/public/images-produk", $name);
                $path = asset('/images-produk/'.$name);
                
                $save = Product_image::create([
                    'product_id' => $id,
                    'thumbnail' => $path
                ]);   
            }

            $post->name = $request->input('nama_produk');
            $post->category_product_id = $request->input('kategori');
            $post->brand_id = $request->input('brand');
            $post->sku = $request->input('sku');
            $post->qty = $request->input('qty');
            $post->weight = $request->input('berat');
            $post->stock_status = $request->input('status_stok');
            $post->description = $request->input('keterangan');
            $post->price = $request->input('price');
            $post->diskon =  $request->input('diskon') == "" ? "0" : $request->input('diskon');
            $post->diskon_status = $request->input('status_diskon') == "" ? "0" : $request->input('status_diskon');
            $post->save();


        } else {
                $post->name = $request->input('nama_produk');
                $post->category_product_id = $request->input('kategori');
                $post->brand_id = $request->input('brand');
                $post->sku = $request->input('sku');
                $post->qty = $request->input('qty');
                $post->weight = $request->input('berat');
                $post->stock_status = $request->input('status_stok');
                $post->description = $request->input('keterangan');
                $post->price = $request->input('price');
                $post->diskon =  $request->input('diskon') == "" ? "0" : $request->input('diskon');
                $post->diskon_status = $request->input('status_diskon') == "" ? "0" : $request->input('status_diskon');
                $post->save();
        }

       return redirect('admin/product')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        DB::table('product_images')->where('product_id', $id)->delete();

        return redirect('/admin/product')->with(['success' => 'Data Berhasil di Hapus']);
    }

    public function delete_gambar($id, $id_produk)
    {
        DB::table('product_images')->where('id', $id)->delete();
        return redirect('/admin/edit-product/'.$id_produk)->with(['success' => 'Data Berhasil di Hapus']);
    }
}
