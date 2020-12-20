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
            <h1 class="m-0 text-dark">Edit Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit Produk</a></li>
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
                <h3 class="card-title">Edit Produk</h3>
              </div>
              <!-- /.card-header -->
                    <!-- form start -->
                     <form class="form-horizontal" method="post" action="{{url('admin/update-product/'.$dataProduct->id)}}" enctype="multipart/form-data">
                      @csrf
                        <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_produk" class="form-control" value="{{$dataProduct->name}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori Produk</label>
                            <div class="col-sm-10">
                               <select class="custom-select form-control mr-sm-2 select2 w-25" required  name="kategori">
                                 <option value="">Pilih</option>
                                    @foreach($dataCategry as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id == $dataProduct->category_product_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Brand Produk</label>
                            <div class="col-sm-10">
                               <select class="custom-select form-control mr-sm-2 select2 w-25" required name="brand">
                                 <option value="">Pilih</option>
                                    @foreach($dataBrand as $brand)
                                        <option value="{{ $brand->id }}" {{ $brand->id == $dataProduct->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">SKU / (Kode produk)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required value="{{$dataProduct->sku}}"  name="sku">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="qty" value="{{$dataProduct->qty}}">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="price" value="{{$dataProduct->price}}">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Berat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required value="{{$dataProduct->weight}}"  name="berat">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Status Skok</label>
                            <div class="col-sm-10">
                               <select class="custom-select form-control mr-sm-2 select2 w-25"  name="status_stok">
                                    <option value="1" <?= $dataProduct->status == "1" ? "selected" : "" ?>>Aktif</option>
                                    <option value="0"  <?= $dataProduct->status == "0" ? "selected" : "" ?>>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Photo Produk</label>
                            <div class="col-sm-10">
                                    <div class="row">
                                        @foreach ($detail_product as $item)
                                            <div class="col-md-3">
                                                <img src="{{$item->thumbnail}}" class="img-fluid" alt="">
                                                <a href="{{url('admin/delete-datail-gambar/'.$item->id)}}/{{Request::segment(3)}}" class="h4 float-right"><i class="far fa-trash-alt"></i></a>
                                            </div>
                                        @endforeach
                                    </div>
                               <div class="input-images">
                               </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan Produk</label>
                            <div class="col-sm-10">
                                <textarea name="keterangan" id="" required>{{$dataProduct->description}}</textarea>
                            </div>
                        </div>

                        <hr>
                        <small>* Boleh di isi atau tidak</small>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Diskon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="diskon" value="{{$dataProduct->diskon}}" placeholder="dalam bentuk persen jika isi 5, berarti 5%">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Diskon Status</label>
                            <div class="col-sm-10">
                               <select class="custom-select form-control mr-sm-2 select2 w-25"  name="status_diskon">
                                    <option value="" <?= $dataProduct->diskon_status == "" ? "selected" : "" ?>>Pilih</option>
                                    <option value="1" <?= $dataProduct->diskon_status == "1" ? "selected" : "" ?>>Aktif</option>
                                    <option value="0"  <?= $dataProduct->diskon_status == "0" ? "selected" : "" ?>>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Simpan</button>
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

@endsection
 