<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo_gallery;


class PhotogalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAll = Photo_gallery::all();
        return view('backend/admin/content-pages/photo_gallery.index', compact('dataAll'));
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
            $resorce->move(\base_path() . "/public/images-gallery", $name);
            $path = asset('/images-gallery/'.$name);

            $save = Photo_gallery::create([
                'title' => $request->input('title'),
                'description' => $request->input('keterangan'),
                'images' => $path,
            ]);
        }


        return redirect('admin/photo-gallery')->with(['success' => 'Data Berhasil di Tambahkan']);
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
        $data = Photo_gallery::find($id);
        return view('backend/admin/content-pages/photo_gallery.update', compact('data'));
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
        $post = new Photo_gallery();
        $post = Photo_gallery::find($id);


       if ($request->hasFile('images')) {
            $resorce       = $request->file('images');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images-gallery", $name);
            $path = asset('/images-gallery/'.$name);

            $post->title = $request->input('title');
            $post->description = $request->input('keterangan');
            $post->images = $path;
            $post->save();

        } else {
            $post->title = $request->input('title');
            $post->description = $request->input('keterangan');
            $post->save();
        }

       return redirect('admin/photo-gallery')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Photo_gallery::where('id', $id)->first();
        $data->delete();
        return redirect('admin/photo-gallery')->with(['success' => 'Data Berhasil di Hapus']);
    }
}
