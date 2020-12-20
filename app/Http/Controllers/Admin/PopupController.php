<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Popup;


class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $dataAll = Popup::all();
        return view('backend/admin/content-pages/popup.index', compact('dataAll'));
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
            $resorce->move(\base_path() . "/public/images-popup", $name);
            $path = asset('/images-popup/'.$name);


            $save = Popup::create([
                'name' => $request->input('title'),
                'status' => $request->input('status'),
                'description' => $request->input('keterangan'),
                'images' => $path,
            ]);
        }


        return redirect('admin/popup')->with(['success' => 'Data Berhasil di Tambahkan']);
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
        $data = Popup::find($id);
        return view('backend/admin/content-pages/popup.update', compact('data'));
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
        $post = new popup();
        $post = popup::find($id);


       if ($request->hasFile('images')) {
            $resorce       = $request->file('images');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images-popup", $name);
            $path = asset('/images-popup/'.$name);

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

       return redirect('admin/popup')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Popup::where('id', $id)->first();
        $data->delete();
        return redirect('admin/popup')->with(['success' => 'Data Berhasil di Hapus']);
    
    }
}
