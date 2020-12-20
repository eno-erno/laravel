@extends('backend/admin/base.base')
@section('title', 'Halaman About')
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
            <h1 class="m-0 text-dark">About</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">About</a></li>
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
                <a href="{{url('admin/create-about')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah About</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Keterangan</th>
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
                            <a data-fancybox="gallery" href="{{$item->image}}"><img width="100" src="{{$item->image}}"></a>
                          </td>
                          <td><?= $item->description ?></td>
                         <td> 
                            <a href="{{url('admin/edit-about')}}/{{$item->id}}"><span class="badge badge-success p-2"><i class="far fa-eye"></i></span></a>
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
                                <a href="{{url('admin/delete-about')}}/{{$item->id}}" class="btn btn-danger" name="save"><i class="far fa-trash-alt"></i> Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                  @endforeach                 
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Judul</th>
                    <th>Gambar</th>
                    <th>Keterangan</th>
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
      <form>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
      </div>
      <div class="modal-footer">
        <input type="text" id="products">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
 