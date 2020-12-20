<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner_promotion;


class BannerpromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAll = Banner_promotion::all();
        return view('backend/admin/content-pages/banner_promo.index', compact('dataAll'));
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
        if ($request->hasFile('images')) {
            $resorce = $request->file('images');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images-promo", $name);
            $path = asset('/images-promo/'.$name);


            $save = Banner_promotion::create([
                'name' => $request->input('title'),
                'status' => $request->input('status'),
                'description' => $request->input('keterangan'),
                'images' => $path,
            ]);
        }


        return redirect('admin/banner-promo')->with(['success' => 'Data Berhasil di Tambahkan']);
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
        $data = Banner_promotion::find($id);
        return view('backend/admin/content-pages/banner_promo.update', compact('data'));
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
        
        $post = new Banner_promotion();
        $post = Banner_promotion::find($id);


       if ($request->hasFile('images')) {
            $resorce       = $request->file('images');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images-promo", $name);
            $path = asset('/images-promo/'.$name);

            $post->name = $request->input('title');
            $post->description = $request->input('keterangan');
            $post->status = $request->input('status');
            $post->images = $path;
            $post->save();

        } else {
            $post->name = $request->input('title');
            $post->description = $request->input('keterangan');
            $post->status = $request->input('status');
            $post->save();
        }

       return redirect('admin/banner-promo')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Banner_promotion::where('id', $id)->first();
        $data->delete();
        return redirect('admin/banner-promo')->with(['success' => 'Data Berhasil di Hapus']);
    }
}
