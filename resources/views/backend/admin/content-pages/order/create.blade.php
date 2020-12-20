@extends('backend/admin/base.base')
@section('title', 'Halaman Product')
@section('content-pages')
<style>
    .select2-selection {height:37px !important}
</style>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="{{url('plugins/dist/image-uploader.min.css')}}">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Order Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tambah Order Baru</a></li>
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
                <h3 class="card-title">Tambah Order Baru</h3>
              </div>
              <!-- /.card-header -->
                    <!-- form start -->
                     <form class="form-horizontal" method="post" action="{{url('admin/store-product')}}" enctype="multipart/form-data">
                      @csrf
                        <div class="card-body">
                        <small class="badge badge-danger">*data Order</small>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <select class="custom-select form-control mr-sm-2 select2" id="produk"  name="produk">
                                 <option value="">-- pilih --</option>
                                    @foreach($data_produk as $produk)
                                        <option value="{{$produk->id}}">{{$produk->name}}</option>
                                    @endforeach
                               </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Satuan</label>
                            <div class="col-sm-10" id="harga_produk">
                                <input type="text"  class="form-control" name="harga_satuan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Banyak</label>
                            <div class="col-sm-10">
                                <input type="text" id="banyak" class="form-control" name="banyak">
                            </div>
                        </div>
                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kode Order</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="kode_order" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="inputEmail4">Pengirimanan (Jasa Kurir)</label>
                                    <select class="custom-select form-control mr-sm-2 select2"  name="kurir">
                                        @foreach($shipping as $data_shipping)
                                            <option value="{{$data_shipping->id}}">{{$data_shipping->keterangan}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Bank</label>
                                <select class="custom-select form-control mr-sm-2 select2"  name="brand">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Bukti Transfer</label>
                                    <input type="file" class="form-control" name="sku" accept="image/*" onchange="loadFile(event)">
                                    <img id="output"/ width="120">
                            </div>
                        </div>
                        

                        <hr>
                        <small class="badge badge-danger">*data pelangan</small>
                         <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Nama Pelangan</label>
                                <input type="text" class="form-control" name="sku">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="sku" placeholder="*tidak wajib di isi">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">No. Telpn</label>
                                <input type="text" class="form-control" name="sku">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kode Pos</label>
                                <input type="text" class="form-control" name="sku" placeholder="*tidak wajib di isi">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Provinsi</label>
                                <select class="custom-select form-control mr-sm-2 select2" id="province"  name="brand">
                                    <option value="">Pilih</option>
                                    @foreach($dataProvinsi['rajaongkir']['results'] as $prov)
                                        <option value="{{$prov['province_id']}}">{{$prov['province']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kota</label>
                                <div id="city_d">
                                    <select class="custom-select form-control mr-sm-2 select2">
                                            <option value="">Pilih</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                         <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Alamat Lengkap</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Biaya Pengirimanan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="sku" id="biaya_kirim">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label" id="berat_barang">Berat Barang</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="sku" id="berat" placeholder="*satuan kg">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Total Keseluruan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="sku" id="total">
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Simpan</button>
                            <a class="btn btn-default float-right" onclick="window.history.back();">Batal</a>
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
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>


  <script>
    $('#produk').change(function(){
        var produk = $(this).val();
        $.ajax({
            url: "{{url('admin/price-produk')}}",
            data: {produk :produk},
            method: 'get',
            success: function(result){
                $("#harga_produk").html(result);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log(errorThrown)
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#banyak, #harga_satuan, #biaya_kirim, #berat").keyup(function() {
            var banyak  = $("#banyak").val();
            var harga_satuan = $("#harga_satuan").val();
            var biaya_kirim = $("#biaya_kirim").val();
            var berat = $("#berat").val();

            var total = parseInt(banyak) * parseInt(harga_satuan) + parseInt(biaya_kirim) * parseInt(berat);
            $("#total").val(total);
        });
    });
</script>

<script>
    $('#province').change(function(){
        var province = $(this).val();
        $.ajax({
            url: "{{url('admin/city-d')}}",
            data: {province :province},
            method: 'get',
            success: function(result){
                $("#city_d").html(result);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log(errorThrown)
            }
        });
    });
</script>

@endsection
 