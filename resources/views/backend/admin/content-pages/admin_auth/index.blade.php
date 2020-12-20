@extends('backend/admin/base.base')
@section('title', 'Halaman Banner Promo')
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
            <h1 class="m-0 text-dark">Akun</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Akun</a></li>
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
                <a href="{{url('admin/create-akun')}}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Akun</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Images</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <?php $no = 0;?>
                  @foreach ($dataAll as $item)
                  <?php $no++ ;?>
                         <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <?=$item->status == "1" ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>'?>
                            </td>
                            <td>
                                <a data-fancybox="gallery" href="{{$item->avatar}}"><img width="50" src="{{$item->avatar}}"></a>
                            </td>                           
                            <td> 
                              <a href="{{url('admin/edit-akun')}}/{{$item->id}}"><span class="badge badge-success p-2"><i class="far fa-eye"></i></span></a>
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
                                <a href="{{url('admin/delete-akun')}}/{{$item->id}}" class="btn btn-danger" name="save"><i class="far fa-trash-alt"></i> Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                  @endforeach                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Images</th>
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
      <form action="{{url('admin/store-akun')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" required name="nama">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" required name="email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" required name="password">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Photo</label>
            <input type="file" class="form-control" required name="images" accept="image/*" onchange="loadFile(event)">
            <img width="100" id="output">
          </div>
          
           <div class="form-group">
            <label for="exampleInputEmail1">Satus</label>
             <select class="custom-select form-control mr-sm-2 select2 w-25" required  name="status">
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
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'keterangan' );
</script>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
@endsection
 