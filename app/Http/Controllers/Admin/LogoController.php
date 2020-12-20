<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;


class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAll = Logo::all();
        return view('backend/admin/content-pages/logo.index', compact('dataAll'));
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
            $resorce->move(\base_path() . "/public/images-logo", $name);
            $path = asset('/images-logo/'.$name);

            $save = Logo::create([
                'keterangan' => $request->input('keterangan'),
                'status' => $request->input('status'),
                'images' => $path,
            ]);
        }


        return redirect('admin/logo')->with(['success' => 'Data Berhasil di Tambahkan']);
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
        $data = Logo::find($id);
        return view('backend/admin/content-pages/logo.update', compact('data'));
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
        
        $post = new Logo();
        $post = Logo::find($id);


       if ($request->hasFile('logo')) {
            $resorce       = $request->file('logo');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images-logo", $name);
            $path = asset('/images-logo/'.$name);

            $post->keterangan = $request->input('title');
            $post->status = $request->input('status');
            $post->images = $path;
            $post->save();

            echo "Gambar berhasil di upload";
        } else {
            $post->keterangan = $request->input('title');
            $post->status = $request->input('status');
            $post->save();
        }

       return redirect('admin/logo')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Logo::where('id', $id)->first();
        $data->delete();
        return redirect('admin/logo')->with(['success' => 'Data Berhasil di Hapus']);
    }
}
