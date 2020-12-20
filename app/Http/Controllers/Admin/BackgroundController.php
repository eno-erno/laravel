<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Background;


class BackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAll = Background::all();
        return view('backend/admin/content-pages/background.index', compact('dataAll'));
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
            $resorce->move(\base_path() . "/public/images-background", $name);
            $path = asset('/images-background/'.$name);

            $save = Background::create([
                'name' => $request->input('title'),
                'status' => $request->input('status'),
                'image' => $path,
            ]);
        }


        return redirect('admin/background')->with(['success' => 'Data Berhasil di Tambahkan']);
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
        $data = Background::find($id);
        return view('backend/admin/content-pages/background.update', compact('data'));
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
         $post = new Background();
        $post = Background::find($id);


       if ($request->hasFile('images')) {
            $resorce       = $request->file('images');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images-background", $name);
            $path = asset('/images-background/'.$name);

            $post->name = $request->input('title');
            $post->status = $request->input('status');
            $post->image = $path;
            $post->save();
        } else {
            $post->name = $request->input('title');
            $post->status = $request->input('status');
            $post->save();
        }

       return redirect('admin/background')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Background::where('id', $id)->first();
        $data->delete();
        return redirect('admin/background')->with(['success' => 'Data Berhasil di Hapus']);
    }
}
