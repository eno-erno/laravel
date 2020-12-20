<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin_auth;

class AdminauthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAll = Admin_auth::all();
        return view('backend/admin/content-pages/admin_auth.index', compact('dataAll'));
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
            $resorce->move(\base_path() . "/public/images-akun", $name);
            $path = asset('/images-akun/'.$name);

            $password = $request->input('password');
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);

            $save = Admin_auth::create([
                'name' => $request->input('nama'),
                'email' => $request->input('email'),
                'password' => $hashpassword,
                'status' => $request->input('status'),
                'avatar' => $path,
            ]);
        }


        return redirect('admin/akun')->with(['success' => 'Data Berhasil di Tambahkan']);
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
        $data = Admin_auth::find($id);
        return view('backend/admin/content-pages/admin_auth.update', compact('data'));
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

        $post = new Admin_auth();
        $post = Admin_auth::find($id);

        $password = $request->input('password');
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);

       if ($request->hasFile('images')) {
            $resorce       = $request->file('images');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images-akun", $name);
            $path = asset('/images-akun/'.$name);

            $post->name = $request->input('name');
            $post->email = $request->input('email');
            $post->password = $hashpassword;
            $post->status = $request->input('status');
            $post->avatar = $path;
            $post->save();

        } else {
            $post->name = $request->input('name');
            $post->email = $request->input('email');
            $post->password = $hashpassword;
            $post->status = $request->input('status');
            $post->save();
        }

       return redirect('admin/akun')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Admin_auth::where('id', $id)->first();
        $data->delete();
        return redirect('admin/akun')->with(['success' => 'Data Berhasil di Hapus']);
    }
}
