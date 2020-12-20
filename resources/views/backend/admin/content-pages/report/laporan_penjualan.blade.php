@extends('backend/admin/content-pages/report.index')
@section('title', 'Halaman Product')
@section('content-report')

 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <span class="right badge badge-danger my-2">*Laporan Penjualan</span>
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Dari</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">Sampai</label>
                                <input type="date" class="form-control">
                            </div>
                             <div class="col-md-3">
                                <button class="btn btn-success" style="margin-top:2rem ">Cetak Perpriode</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-info float-right" style="margin-top:2rem ">Cetak Semua Data</button>
                            </div>
                        </div>
                    </div> 
                    <div class="card-body">   
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Judul</th>
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
@endsection