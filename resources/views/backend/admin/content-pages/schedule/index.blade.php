@extends('backend/admin/base.base')
@section('title', 'Halaman Shedule')
@section('content-pages')
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

<style>
    .select2-selection {height:37px !important}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Jadwal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Jadwal</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
              <div class="card-header">
                <a href="{{url('admin/create-products')}}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Jadwal</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Images</th>
                    <th>Media Sosial</th>
                    <th>Status</th>
                    <th>Dari</th>
                    <th>Sampai</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php $no = 0;?>
                  @foreach ($dataAll as $item)
                  <?php $no++ ;?>
                         <tr>
                            <td>{{$item->title}}</td>
                            <td>
                                <a data-fancybox="gallery" href="{{$item->images}}"><img width="50" src="{{$item->images}}"></a>
                            </td>
                            <td>{{$item->media_sosial}}</td>
                            <td>
                                <?=$item->status == "1" ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>'?>
                            </td>
                            <td>
                                {{-- {{strftime('%Y-%m-%dT%H:%M:%S', time($item->from))}} --}}
                                {{date('d-F-Y/H:i', strtotime($item->from))}}
                            </td>
                            <td>
                                {{date('d-F-Y/H:i', strtotime($item->until))}}

                               <?php 

                                if( date('d-F-Y', strtotime($item->until)) == date('d-F-Y'))
                                {
                                    DB::table('schedules')->where('id', $item->id)->update(['status' => '0']);;
                                }
                                ?>
                            </td>
                            <td> 
                              <a href="{{url('admin/edit-jadwal')}}/{{$item->id}}"><span class="badge badge-success p-2"><i class="far fa-eye"></i></span></a>
                              <a href="" data-toggle="modal" data-target="#myModalDelete{{ $no }}"><span class="badge badge-danger p-2"><i class="far fa-trash-alt"></i></span></a>
                              
                            </td>
                        </tr>

                        <!-- Modal detete -->
                        <div class="modal fade" id="myModalDelete{{ $no }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-success">
                                <h5 class="modal-title" id="exampleModalLabel">Yakin dihapus !</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="far fa-window-close"></i> Batal</button>
                                <a href="{{url('admin/delete-jadwal')}}/{{$item->id}}" class="btn btn-danger" name="save"><i class="far fa-trash-alt"></i> Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                  @endforeach                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Judul</th>
                    <th>Images</th>
                    <th>Media Sosial</th>
                    <th>Status</th>
                    <th>Dari</th>
                    <th>Sampai</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@if ($message = Session::get('success'))
<div id="modalSuccess" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content bg-success">
            <div class="modal-header">
                <div class="row w-100">
                  <div class="col-md-10">
                    <h4 class="modal-title">
                       <strong>{{ $message }}</strong>
                    </h4>
                  </div>
                  <div class="col-md-2">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{url('admin/store-jadwal')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jawal Live</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Judul</label>
            <input type="text" class="form-control" name="judul">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Gambar</label>
            <input type="file" class="form-control" name="images">
          </div>
          <div class="form-group">
               <div class="row">
                    <div class="col-6">
                        <label for="exampleInputEmail1">Dari</label>
                        <input type="datetime-local" class="form-control" name="dari">
                    </div>
                    <div class="col-6">
                       <label for="exampleInputEmail1">Sampai</label>
                       <input type="datetime-local" class="form-control" name="sampai">
                    </div>
               </div>
          </div>
           <div class="form-group">
                <label for="exampleInputEmail1">Media Sosial</label>
                <select class="custom-select form-control mr-sm-2 select2 w-25"  name="media_sosial">
                    <option value="FACEBOOK">Facebook</option>
                    <option value="YOUTUBE">Youtube</option>
                    <option value="INSTAGRAM">Instagram</option>
                </select>
          </div>
           <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select class="custom-select form-control mr-sm-2 select2 w-25"  name="status">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
  </div>
</div>

<script>
  $(document).on("click",".addCategory", function(){
    $("#products").val($(this).attr("data-id"))
    $("#exampleModal").modal("show")
  })
</script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

@endsection
 