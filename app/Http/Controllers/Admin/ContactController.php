<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $dataAll = Contact::all();
        return view('backend/admin/content-pages/contact.index', compact('dataAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/admin/content-pages/contact.create');
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
            $resorce->move(\base_path() . "/public/images-contact", $name);
            $path = asset('/images-contact/'.$name);

            $save = Contact::create([
                'title' => $request->input('title'),
                'email' => $request->input('email'),
                'maps' => $request->input('maps'),
                'description' => $request->input('keterangan'),
                'image' => $path,
            ]);
        }


        return redirect('admin/contact')->with(['success' => 'Data Berhasil di Tambahkan']);
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
        $data = Contact::find($id);
        return view('backend/admin/content-pages/contact.update', compact('data'));
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
        $post = new Contact();
        $post = Contact::find($id);


       if ($request->hasFile('images')) {
            $resorce       = $request->file('images');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images-contact", $name);
            $path = asset('/images-contact/'.$name);

            $post->title = $request->input('title');
            $post->email = $request->input('email');
            $post->maps = $request->input('maps');
            $post->description = $request->input('keterangan');
            $post->image = $path;
            $post->save();

        } else {
            $post->title = $request->input('title');
            $post->email = $request->input('email');
            $post->maps = $request->input('maps');
            $post->description = $request->input('keterangan');
            $post->save();
        }

       return redirect('admin/contact')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Contact::where('id', $id)->first();
        $data->delete();
        return redirect('admin/contact')->with(['success' => 'Data Berhasil di Hapus']);
    }
}
