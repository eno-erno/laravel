@extends('backend/admin/content-pages/report.index')
@section('title', 'Halaman Product')
@section('content-report')

 
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <span class="right badge badge-danger my-2">*Laporan Produk</span>
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Dari</label>
                                <input type="date" id="from" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">Sampai</label>
                                <input type="date" id="until" class="form-control">
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
                                    <th>Nama Produk</th>
                                    <th>SKU</th>
                                    <th>Stock</th>
                                    <th>Berat</th>
                                    <th>Status Stok</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php $no = 0;?>
                        @foreach ($dataProduct as $item)
                        <?php $no++ ;?>
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->sku}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->weight}}Kg</td>
                                    <td><?= $item->stock_status == "1" ? "<span class='badge badge-success'>Aktif</span>" : "<span class='badge badge-danger'>Tidak akif</span>" ?></td>
                                    <td>Rp. {{number_format($item->price),'','.'}}</td>
                                </tr>
                        @endforeach                 
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nama Produk</th>
                            <th>SKU</th>
                            <th>Stock</th>
                            <th>Berat</th>
                            <th>Status Stok</th>
                            <th>Harga</th>
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

<script type="text/javascript">
    $(document).ready(function() {
        $("#from, #until").keyup(function() {
            var from  = $("#from").val();
            var until = $("#until").val();
           
           console.log(from);


            var total = parseInt(banyak) * parseInt(harga_satuan) + parseInt(biaya_kirim) * parseInt(berat);
            $("#total").val(total);
        });
    });
</script>

@endsection