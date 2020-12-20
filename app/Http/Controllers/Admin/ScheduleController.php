<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataAll = Schedule::all();
        return view('backend/admin/content-pages/schedule.index', compact('dataAll'));
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
            $resorce->move(\base_path() . "/public/images-schedule", $name);
            $path = asset('/images-schedule/'.$name);

            $save = Schedule::create([
                'title' => $request->input('judul'),
                'from' => $request->input('dari'),
                'until' => $request->input('sampai'),
                'status' => $request->input('status'),
                'media_sosial' => $request->input('media_sosial'),
                'images' => $path,
            ]);
        }

        return redirect('admin/jadwal')->with(['success' => 'Data Berhasil di Tambahkan']);

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
        $data = Schedule::find($id);
        return view('backend/admin/content-pages/schedule.update', compact('data'));
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

        $post = new Schedule();
        $post = Schedule::find($id);


       if ($request->hasFile('images')) {
            $resorce       = $request->file('images');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images-schedule", $name);
            $path = asset('/images-schedule/'.$name);


            $post->title = $request->input('judul');
            $post->status = $request->input('status');
            $post->from = $request->input('dari');
            $post->until = $request->input('sampai');
            $post->media_sosial = $request->input('media_sosial');
            $post->images = $path;
            $post->save();

        } else {
            $post->title = $request->input('judul');
            $post->status = $request->input('status');
            $post->from = $request->input('dari');
            $post->until = $request->input('sampai');
            $post->media_sosial = $request->input('media_sosial');
            $post->save();
        }

       return redirect('admin/jadwal')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Schedule::where('id', $id)->first();
        $data->delete();
        return redirect('admin/jadwal')->with(['success' => 'Data Berhasil di Hapus']);
    }
}
