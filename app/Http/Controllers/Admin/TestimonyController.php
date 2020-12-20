<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimony;


class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAll = Testimony::all();
        return view('backend/admin/content-pages/testimony.index', compact('dataAll'));
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
            $resorce->move(\base_path() . "/public/images-testimony", $name);
            $path = asset('/images-testimony/'.$name);

            $save = Testimony::create([
                'title' => $request->input('title'),
                'description' => $request->input('keterangan'),
                'images' => $path,
            ]);
        }


        return redirect('admin/testimoni')->with(['success' => 'Data Berhasil di Tambahkan']);
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
        $data = Testimony::find($id);
        return view('backend/admin/content-pages/testimony.update', compact('data'));
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
        $post = new Testimony();
        $post = Testimony::find($id);


       if ($request->hasFile('images')) {
            $resorce       = $request->file('images');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images-testimony", $name);
            $path = asset('/images-testimony/'.$name);

            $post->title = $request->input('title');
            $post->description = $request->input('keterangan');
            $post->images = $path;
            $post->save();

            echo "Gambar berhasil di upload";
        } else {
            $post->title = $request->input('title');
            $post->description = $request->input('keterangan');
            $post->save();
        }

       return redirect('admin/testimoni')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Testimony::where('id', $id)->first();
        $data->delete();
        return redirect('admin/testimoni')->with(['success' => 'Data Berhasil di Hapus']);
    }
}
