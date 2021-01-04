@extends('frontend.app')
@section('title', 'Halaman Produk')
@section('head')
    <style>
        /* ini css product */
        .kategori li a:hover{background:black; color:#fff !important}
    </style>
@endsection
@section('content-pages')
<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
            <h1 class="h2 text-uppercase mb-0">Produk</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Produk</li>
                </ol>
            </nav>
            </div>
        </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container p-0">
        <div class="row">
            <!-- SHOP SIDEBAR-->
            <div class="col-lg-3 order-2 order-lg-1">
            <h5 class="text-uppercase mb-4">Kategori</h5>
            <!-- <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">Fashion &amp; Acc</strong></div> -->
                <ul class="list-unstyled small text-muted pl-0 lg-4 font-weight-normal kategori">
                    @foreach($category as $row)
                        @if($row->parent != 0)
                            <li class=""><a class="p-2 reset-anchor text-dark font-weight-bold d-block" href="{{url('kategori/'.$row->id)}}">{{$row->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!-- SHOP LISTING-->
            <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
            <div class="row">
                @foreach($product as $rows) 
                    <div class="col-lg-4 col-sm-6">
                        <div class="product text-center">
                        <div class="position-relative mb-3">
                            <div class="badge text-white badge-"></div>
                            <a class="d-block" href="{{url('detail-produk/'.$rows->kode_produk)}}">
                                <img class="img-fluid w-100" src="{{$rows->thumbnail}}" alt="...">
                            </a>
                            <div class="product-overlay">
                            <ul class="mb-0 list-inline">
                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                                <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark addToCart text-white" data-image="{{$rows->thumbnail}}" data-name="{{ucwords($rows->name)}}" data-harga="{{$rows->harga}}" data-qty="1" data-id="{{$rows->id}}">Add to cart</button></li>
                                <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-image="{{$rows->thumbnail}}" data-name="{{ucwords($rows->name)}}" data-harga="{{$rows->harga}}" data-toggle="modal" data-id="{{$rows->id}}" data-imageArr="{{$product_image}}"  data-desc="{{ucfirst(strip_tags($rows->description))}}"><i class="fas fa-expand"></i></a></li>
                            </ul>
                            </div>
                        </div>
                        <h6> <a class="reset-anchor" href="{{url('detail-produk/'.$rows->kode_produk)}}">{{ucwords($rows->name)}}</a></h6>
                        <p class="small text-muted">Rp {{ number_format($rows->harga, 0, ',', '.')}}</p>
                        </div>
                    </div>
                @endforeach
               
            </div>
                {{ $product->links() }}
            </div>
        </div>
        </div>
    </section>
</div>
@include('frontend.static.footers')
@endsection
@section('js')
    <script>
        console.log('product')
    </script>
@endsection