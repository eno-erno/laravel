@extends('backend/admin/base.base')
@section('title', 'Halaman Color')
@section('content-pages')
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
            <h1 class="m-0 text-dark">Atur Warna Tampilan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Atur Warna Tampilan</a></li>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Head</a>
                                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Footer</a>
                                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tombol</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                         <div class="card mt-4">
                                            <form action="{{url('admin/update-warna/'.$dataHead->id)}}" method="post">
                                                @csrf
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Silahkan pilih warna</li>
                                                    <li class="list-group-item"><input type="color" class="w-100" value="{{$dataHead->code}}" name="color" style="height: 100px"></li>
                                                    <li class="list-group-item"><button type="submit" class="btn btn-success m-auto btn-lg btn-block">Simpan</button></li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                 <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                         <div class="card mt-4">
                                           <form action="{{url('admin/update-warna/'.$dataFooter->id)}}" method="post">
                                                @csrf
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Silahkan pilih warna</li>
                                                    <li class="list-group-item"><input type="color" class="w-100" value="{{$dataFooter->code}}" name="color" style="height: 100px"></li>
                                                    <li class="list-group-item"><button type="submit" class="btn btn-success m-auto btn-lg btn-block">Simpan</button></li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                 <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                         <div class="card mt-4">
                                           <form action="{{url('admin/update-warna/'.$dataButton->id)}}" method="post">
                                                @csrf
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Silahkan pilih warna</li>
                                                    <li class="list-group-item"><input type="color" class="w-100" value="{{$dataButton->code}}" name="color" style="height: 100px"></li>
                                                    <li class="list-group-item"><button type="submit" class="btn btn-success m-auto btn-lg btn-block">Simpan</button></li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
      <form action="{{url('admin/store-logo')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Logo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="keterangan">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Logo</label>
            <input type="file" class="form-control" name="logo">
          </div>
           <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select class="custom-select form-control mr-sm-2 select2 w-25"  name="status">
                    <option value="1">Atif</option>
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
 