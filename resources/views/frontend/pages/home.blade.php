@extends('frontend.app')
@section('title', 'Halaman Beranda')
@section('head')
    <style>
        /* ini css home */
    </style>
@endsection
@section('content-pages')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" >
        <div class="carousel-item active">
            <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url({{$banner->images}})">
                <div class="container py-5">
                <div class="row px-4 px-lg-5">
                    <div class="col-lg-6">
                        {!! $banner->description !!}
                        <a class="btn btn-dark" href="{{url($banner->link)}}">More</a>
                    </div>
                </div>
                </div>
            </section>
        </div>
        <div class="carousel-item">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url({{$banner->images}})">
            <div class="container py-5">
            <div class="row px-4 px-lg-5">
                <div class="col-lg-6">
                    {!! $banner->description !!}
                    <a class="btn btn-dark" href="{{url($banner->link)}}">More</a>
                </div>
            </div>
            </div>
        </section>
        </div>
        <div class="carousel-item">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url({{$banner->images}})">
            <div class="container py-5">
            <div class="row px-4 px-lg-5">
                <div class="col-lg-6">
                    {!! $banner->description !!}
                    <a class="btn btn-dark" href="{{url($banner->link)}}">More</a>
                </div>
            </div>
            </div>
        </section>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- CATEGORIES SECTION-->
<section class="pt-5">
    <div class="container">
        <div class="row">
            <header class="text-center col-12">
                <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
                <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
            </header>
            @foreach($category as $rows)
                <div class="col-md-3 mb-4 mb-md-0">
                    <a class="category-item" href="{{url('kategori/'.$rows->id)}}">
                        <img class="img-fluid" src="{{asset('frontend/img/cat-img-1.jpg')}}" alt="">
                        <strong class="category-item-title">{{ucwords($rows->name)}}</strong>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- TRENDING PRODUCTS-->
<section class="py-5">
    <div class="container">
        <div class="row">
            <header class="col-12">
                <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
                <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
            </header>
            <!-- PRODUCT-->
            @foreach($product as $rows) 
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="product text-center">
                    <div class="position-relative mb-3">
                        <div class="badge text-white badge-"></div>
                        <a class="d-block" href="{{url('detail-produk/'.$rows->kode_produk)}}">
                            <img class="img-fluid w-100" src="{{$rows->thumbnail}}" alt="...">
                        </a>
                        <div class="product-overlay">
                        <ul class="mb-0 list-inline">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                            <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark addToCart text-white" data-image="{{$rows->thumbnail }}" data-name="{{ucwords($rows->name)}}" data-harga="{{$rows->harga}}" data-qty="1" data-id="{{$rows->id}}">Add to cart</button></li>
                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-image="{{$rows->thumbnail }}" data-name="{{ucwords($rows->name)}}" data-harga="{{$rows->harga}}" data-toggle="modal" data-id="{{$rows->id}}" data-imageArr="{{$product_image}}"  data-desc="{{ucfirst(strip_tags($rows->description))}}"><i class="fas fa-expand"></i></a></li>
                        </ul>
                        </div>
                    </div>
                    <h6> <a class="reset-anchor" href="{{url('detail-produk/'.$rows->kode_produk)}}">{{ucwords($rows->name)}}</a></h6>
                    <p class="small text-muted">Rp {{ number_format($rows->harga, 0, ',', '.')}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- SERVICES-->
<section class="py-5 bg-light">
    <div class="container">
    <div class="row text-center">
        <div class="col-lg-4 mb-3 mb-lg-0">
        <div class="d-inline-block">
            <div class="media align-items-end">
            <svg class="svg-icon svg-icon-big svg-icon-light">
                <use xlink:href="#delivery-time-1"> </use>
            </svg>
            <div class="media-body text-left ml-3">
                <h6 class="text-uppercase mb-1">Free shipping</h6>
                <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-4 mb-3 mb-lg-0">
        <div class="d-inline-block">
            <div class="media align-items-end">
            <svg class="svg-icon svg-icon-big svg-icon-light">
                <use xlink:href="#helpline-24h-1"> </use>
            </svg>
            <div class="media-body text-left ml-3">
                <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="d-inline-block">
            <div class="media align-items-end">
            <svg class="svg-icon svg-icon-big svg-icon-light">
                <use xlink:href="#label-tag-1"> </use>
            </svg>
            <div class="media-body text-left ml-3">
                <h6 class="text-uppercase mb-1">Festival offer</h6>
                <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<!-- NEWSLETTER-->
<section class="py-5">
    <div class="container p-0">
    <div class="row">
        <div class="col-lg-6 mb-3 mb-lg-0">
        <h5 class="text-uppercase">Let's be friends!</h5>
        <p class="text-small text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
        </div>
        <div class="col-lg-6">
        <form action="#">
            <div class="input-group flex-column flex-sm-row mb-3">
            <input class="form-control form-control-lg py-3" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-dark btn-block" id="button-addon2" type="submit">Subscribe</button>
            </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</section>
<!-- modal promotion -->
<!-- <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg" style="margin-top:7rem !important">
    <div class="modal-content" style="width: 70% !important;margin: auto;">
        <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            Modal body..
        </div>
    </div>
    </div>
</div> -->
@include('frontend.static.footers')
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('#myModal').modal('show')
        })
    </script>
@endsection