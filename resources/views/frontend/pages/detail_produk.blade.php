@extends('frontend.app')
@section('title', 'Halaman Detail Produk')
@section('head')
    <style>
        /* ini css product */
    </style>
@endsection
@section('content-pages')
<section class="py-5">
    <div class="container">
        <div class="row mb-5">
        <div class="col-lg-6">
            <!-- PRODUCT SLIDER-->
            <div class="row m-sm-0">
            <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
                <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">
                <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="{{asset('frontend/img/'.$data->thumbnail)}}" alt="..."></div>
                <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="{{asset('frontend/img/'.$data->thumbnail)}}" alt="..."></div>
                <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="{{asset('frontend/img/'.$data->thumbnail)}}" alt="..."></div>
                <div class="owl-thumb-item flex-fill mb-2"><img class="w-100" src="{{asset('frontend/img/'.$data->thumbnail)}}" alt="..."></div>
                </div>
            </div>
            <div class="col-sm-10 order-1 order-sm-2">
                <div class="owl-carousel product-slider" data-slider-id="1">
                    <a class="d-block" href="{{asset('frontend/img/'.$data->thumbnail)}}" data-lightbox="product" title="Product item 1">
                        <img class="img-fluid" src="{{asset('frontend/img/'.$data->thumbnail)}}" alt="...">
                    </a>
                    <a class="d-block" href="{{asset('frontend/img/'.$data->thumbnail)}}" data-lightbox="product" title="Product item 2">
                        <img class="img-fluid" src="{{asset('frontend/img/'.$data->thumbnail)}}" alt="...">
                    </a>
                    <a class="d-block" href="{{asset('frontend/img/'.$data->thumbnail)}}" data-lightbox="product" title="Product item 3">
                        <img class="img-fluid" src="{{asset('frontend/img/'.$data->thumbnail)}}" alt="...">
                    </a>
                    <a class="d-block" href="{{asset('frontend/img/'.$data->thumbnail)}}" data-lightbox="product" title="Product item 4">
                        <img class="img-fluid" src="{{asset('frontend/img/'.$data->thumbnail)}}" alt="...">
                    </a>
                </div>
            </div>
            </div>
        </div>
        <!-- PRODUCT DETAILS-->
        <div class="col-lg-6">
            <h1>{{$data->name}}</h1>
            <p class="text-muted lead">Rp {{number_format($data->harga, 0, ',', '.')}}</p>
            <p class="text-small mb-4">{{$data->description}}</p>
            <div class="row align-items-stretch mb-4">
            <div class="col-sm-5 pr-sm-0">
                <div class="border d-flex align-items-center justify-content-between py-1 px-3">
                    <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                
                    <div class="quantity">
                    <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                    <input class="form-control border-0 shadow-0 p-0 valueQTY" id="valueQTY" type="text" value="1">
                    
                    <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 pl-sm-0"><button class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0 AddDetails " >Add to cart</button></div>
            <!-- </div><a class="btn btn-link text-dark p-0 mb-4" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a><br> -->
            <ul class="list-unstyled small d-inline-block">
            <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">SKU:</strong><span class="ml-2 text-muted">{{$data->sku}}</span></li>
            <!-- <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ml-2" href="#">Demo Products</a></li> -->
            <!-- <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Tags:</strong><a class="reset-anchor ml-2" href="#">Innovation</a></li> -->
            </ul>
        </div>
        </div>
        <!-- DETAILS TABS-->
        <!-- <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
        <li class="nav-item"><a class="nav-link active" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
        
        <div class="tab-pane fade active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <div class="p-4 p-lg-5 bg-white">
            <div class="row">
                <div class="col-lg-8">
                    <div class="media mb-3">
                        <h6 class="text-uppercase">Product description </h6>
                        <p class="text-muted text-small mb-0">{{$data->description}}</p>
                    </div>
                </div>
            </div>
            </div>
        </div> -->
        </div>
        <!-- RELATED PRODUCTS-->
        
        <div class="row">
            <div class="col-12">
                <h2 class="h5 text-uppercase mb-4">Related products</h2>
            </div>
            @foreach($product as $rows) 
                @if($rows->kode_produk != $data->kode_produk)
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="product text-center">
                    <div class="position-relative mb-3">
                        <div class="badge text-white badge-"></div>
                        <a class="d-block" href="{{url('detail-produk/'.$rows->kode_produk)}}">
                            <img class="img-fluid w-100" src="{{asset('frontend/img/'.$rows->thumbnail) }}" alt="...">
                        </a>
                        <div class="product-overlay">
                        <ul class="mb-0 list-inline">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                            <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark addToCart text-white" data-image="{{asset('frontend/img/'.$rows->thumbnail) }}" data-name="{{$rows->name}}" data-harga="{{$rows->harga}}" data-qty="1" data-id="{{$rows->id}}">Add to cart</button></li>
                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-image="{{asset('frontend/img/'.$rows->thumbnail ) }}" data-name="{{$rows->name}}" data-harga="{{$rows->harga}}" data-toggle="modal" data-id="{{$rows->id}}" data-imageArr="{{$product_image}}"  data-desc="{{$rows->description}}"><i class="fas fa-expand"></i></a></li>
                        </ul>
                        </div>
                    </div>
                    <h6> <a class="reset-anchor" href="{{url('detail-produk/'.$rows->kode_produk)}}">{{$rows->name}}</a></h6>
                    <p class="small text-muted">Rp {{ number_format($rows->harga, 0, ',', '.')}}</p>
                    </div>
                </div>
                @else
                    <div class="col-12">
                        <h5>Belum ada produk yang serupa</h5>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    </section>
    @include('frontend.static.footers')
@endsection
@section('js')
    <script>
        console.log('product')
        $(document).ready(function(){
            const datas = JSON.parse(localStorage.getItem('products'))
            const id = {{$data->id}}

            let data_qty = 1;
            if(datas != null){
                const findDataBungkus = datas.filter((item, i) => {
                    if(parseFloat(item.id) === id){
                        data_qty = item.qty
                        data_id = id
                    }
                })
                findDataBungkus
                $('.valueQTY').val(data_qty);
                // $('.valueId').val(id);
            }

        })
        $(document).on("click", '.AddDetails', async function() {
            const datas = JSON.parse(localStorage.getItem('products'))
            const valueQTY = await $('#valueQTY').val()
            const id = await `{{$data->id}}`
            const name = await `{{$data->name}}`
            const harga = await `{{$data->harga}}`
            const image = await `{{asset('frontend/img/'.$data->thumbnail)}}`
            if(valueQTY > 0){
                AddToCart(id, name, harga, image, valueQTY, datas)
            } else {
                alert("Tentukan qty produk")
            }
        })
    </script>
@endsection