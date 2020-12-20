@extends('backend/admin/base.base')
@section('title', 'Halaman Update Photo Gallery')
@section('content-pages')

<style>
    .select2-selection {height:37px !important}
</style>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="{{url('plugins/dist/image-uploader.min.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit Slider</a></li>
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
        <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Popup</h3>
              </div>
              <!-- /.card-header -->
                    <!-- form start -->
                     <form class="form-horizontal" method="post" action="{{url('admin/update-slider/'.$data->id)}}" enctype="multipart/form-data">
                      @csrf
                        <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" value="{{$data->name}}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Images</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="images">
                                <br>
                                <a data-fancybox="gallery" href="{{$data->images}}"><img width="100" src="{{$data->images}}"></a>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Satus</label>
                            <div class="col-sm-10">
                                 <select class="custom-select form-control mr-sm-2 select2 w-25"  name="status">
                                    <option value="1" <?= $data->status == "1" ? "selected" : "" ?>>Aktif</option>
                                    <option value="0"  <?= $data->status == "0" ? "selected" : "" ?>>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea name="keterangan" id="" cols="30" rows="10">{{$data->description}}</textarea>
                            </div>
                        </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Ubah</button>
                            <button class="btn btn-default float-right" onclick="window.history.back();">Batal</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'keterangan' );
</script>


<script type="text/javascript" src="{{url('plugins/dist/image-uploader.min.js')}}"></script>
<script>
  $('.input-images').imageUploader();
</script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'keterangan' );
</script>
@endsection
 