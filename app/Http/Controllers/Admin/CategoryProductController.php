<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category_product;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $dataAll = Category_product::all();
        return view('backend/admin/content-pages/category_product.index', compact('dataAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = Category_product::create([
            'parent' => $request->input('parent'),
            'icon' => $request->input('icon'),
            'name' => $request->input('nama_kategori')
        ]);

        return redirect('admin/kategori-produk')->with(['success' => 'Data Berhasil di Tambahkan']);
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
         $data = Category_product::find($id);

        return view('backend/admin/content-pages/category_product.update', compact('data'));
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
       
        $post = new Category_product();
        $post = Category_product ::find($id);

        $post->name = $request->input('name');
        $post->icon = $request->input('icon');
        $post->save();

        return redirect('/admin/kategori-produk')->with(['success' => 'Data Berhasil di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = Category_product::where('id', $id)->first();
        $data->delete();
        return redirect('admin/kategori-produk')->with(['success' => 'Data Berhasil di Hapus']);
    }
}
