@extends('backend/admin/base.base')
@section('title', 'Halaman Product')
@section('content-pages')
<style>
    .select2-selection {height:37px !important}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Product</a></li>
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
                <a href="{{url('admin/create-product')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Produk</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Produk</th>
                    <th>SKU/Kode Produk</th>
                    <th>Stock</th>
                    <th>Berat</th>
                    <th>Status Stok</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 0;?>
                  @foreach ($dataAll as $item)
                  <?php $no++ ;?>
                         <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->kode_produk}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{$item->weight}}</td>
                            <td><?= $item->stock_status == "1" ? "<span class='badge badge-success'>Aktif</span>" : "<span class='badge badge-danger'>Tidak akif</span>" ?></td>
                            <td>Rp. {{number_format($item->harga,2,',','.')  }}</td>
                            <td>
                                <a href="{{url('admin/edit-product')}}/{{$item->id}}" class="badge badge-success p-2 h-5"><i class="far fa-eye"></i></a>
                                <a href="" data-toggle="modal" data-target="#myModalDelete{{ $no }}" class="badge badge-danger p-2 h-5"><i class="far fa-trash-alt"></i></a>
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
                                <a href="{{url('admin/delete-product')}}/{{$item->id}}" class="btn btn-danger" name="save"><i class="far fa-trash-alt"></i> Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                  @endforeach                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama Produk</th>
                    <th>SKU/Kode Produk</th>
                    <th>Stock</th>
                    <th>Berat</th>
                    <th>Status Stok</th>
                    <th>Harga</th>
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
                    <p class="modal-title">
                       <strong>{{ $message }}</strong>
                    </p>
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


<script>
  $(document).on("click",".addCategory", function(){
    $("#products").val($(this).attr("data-id"))
    $("#exampleModal").modal("show")
  })
</script>

@endsection
 