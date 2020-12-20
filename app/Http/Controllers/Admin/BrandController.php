<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAll = Brand::all();
        return view('backend/admin/content-pages/brand.index', compact('dataAll'));
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

        if ($request->hasFile('logo')) {
            $resorce = $request->file('logo');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images-brand", $name);
            $path = asset('/images-brand/'.$name);

            $save = Brand::create([
                'name' => $request->input('title'),
                'logo' => $path,
            ]);
        }


        return redirect('admin/brand')->with(['success' => 'Data Berhasil di Tambahkan']);
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
        $data = Brand::find($id);
        return view('backend/admin/content-pages/brand.update', compact('data'));
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
        $post = new Brand();
        $post = Brand::find($id);


       if ($request->hasFile('logo')) {
            $resorce       = $request->file('logo');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images-brand", $name);
            $path = asset('/images-brand/'.$name);

            $post->name = $request->input('title');
            $post->logo = $path;
            $post->save();

            echo "Gambar berhasil di upload";
        } else {
            $post->name = $request->input('title');
            $post->save();
        }

       return redirect('admin/brand')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Brand::where('id', $id)->first();
        $data->delete();
        return redirect('admin/brand')->with(['success' => 'Data Berhasil di Hapus']);
    }
}
