@extends('frontend.app')
@section('title', 'Detail Pesanan')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        /* ini css detail */
    </style>
@endsection
@section('content-pages')
<div class="container">
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Keranjang Belanja</h2>
        <div class="row">
            <div class="col-8">
                <div id="validasiSuccess"></div>
            </div>
        </div>
        <form method="POST" id="submitPesanan">
            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <!-- CART TABLE-->
                    <div class="table-responsive mb-4">
                    <table class="table">
                        <thead class="bg-light">
                        <tr>
                            <th class="text-center border" scope="col"> <strong class="text-small text-center text-uppercase">Produk</strong></th>
                            <th class="text-center border" scope="col"> <strong class="text-small text-center text-uppercase">Harga</strong></th>
                            <th class="text-center border" scope="col"> <strong class="text-small text-center text-uppercase">Qty</strong></th>
                            <th class="text-center border" scope="col"> <strong class="text-small text-center text-uppercase">Total</strong></th>
                            <th class="border text-center" scope="col"> <strong class="text-small text-center text-uppercase"></strong></th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    </div>
                    <!-- CART NAV-->
                    <div class="bg-light px-4 py-3">
                        <div class="row align-items-center text-center">
                            <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="{{url('produk')}}"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Tambahkan Pesanan</a></div>
                            <div class="col-md-6 text-md-right">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item ml-auto">
                                        <a class="btn btn-outline-dark btn-sm" data-toggle="pill" href="#Checkout">
                                            Lanjutkan Pesanan
                                            <i class="fas fa-long-arrow-alt-right ml-2"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content">
                                <div id="Checkout" class="container tab-pane fade"><br>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="" class="font-weight-bold">Nama</label>
                                                <input type="text" name="nama" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="" class="font-weight-bold">Telepon/WhatsApp</label>
                                                <input type="text" name="tlp" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="" class="font-weight-bold">Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="" class="font-weight-bold">Alamat Lengkap</label>
                                                <textarea name="alamat" id="" rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="" class="font-weight-bold">Catatan Pesanan</label>
                                                <textarea name="notes" id="" rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button id="ButtonOrders" class="btn btn-success btn-sm btn-block bg-dark border-dark">Pesan sekarang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ORDER TOTAL-->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                    <div class="card-body">
                        <h5 class="text-uppercase mb-4">Total Pesanan</h5>
                        <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small" id="subtotal"></span></li>
                        <li class="border-bottom my-2"></li>
                        <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span id="tot">0</span></li>
                        <!-- <li>
                            <form action="#">
                            <div class="form-group mb-0">
                                <input class="form-control" type="text" placeholder="Enter your coupon">
                                <button class="btn btn-dark btn-sm btn-block" type="submit"> <i class="fas fa-gift mr-2"></i>Apply coupon</button>
                            </div>
                            </form>
                        </li> -->
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
@include('frontend.static.footers')
@endsection
@section('js')
    <script>
        const tableView = async function(cart, id){
            $('#Cart').text(id)
            if(cart.length != null || cart.length != 0){

                let out = '';
                    await cart.forEach((item, index) => {
                        out += `
                            <tr>
                                <th class="pl-0 border-0" scope="row">
                                <div class="media align-items-center">
                                    <a class="reset-anchor d-block animsition-link" href="detail.html">
                                        <img src="${ item.image }" alt="${ item.name }" width="70"/>
                                    </a>
                                        <div class="media-body ml-3">
                                            <strong class="h6">
                                                <a class="reset-anchor animsition-link" href="">${ item.name }</a>
                                            </strong>
                                        </div>
                                </div>
                                </th>
                                <td class="align-middle border-0">
                                    <p class="mb-0 small">${ Format_Rupiah_Final(item.harga) }</p>
                                </td>
                                <td class="align-middle border-0">
                                    <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                                        <div class="quantity">
                                            <button class="dec-btn p-0 btnCalculation" data-type="prev" data-id="${index}"><i class="fas fa-caret-left"></i></button>
                                                <input readonly class="form-control form-control-sm border-0 shadow-0 p-0" name="qty[]" id="textInput" type="text" value="${ item.qty }"/>
                                            <button class="inc-btn p-0 btnCalculation" data-type="next" data-id="${index}"><i class="fas fa-caret-right"></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle border-0">
                                    <p class="mb-0 small totals">${ Format_Rupiah_Final(parseFloat(item.harga) * parseFloat(item.qty)) }</p>
                                </td>
                                <td class="align-middle border-0">
                                    <input type="hidden" name="id[]" value="${item.id}">
                                    <button type="button" class="reset-anchor btnHapus" data-id="${item.id}">
                                        <i class="fas fa-trash-alt small text-muted"></i>
                                    </button>
                                    </td>
                            </tr>
                        `;
                    })
                    $('table tbody').html(out)
                    var total = 0;
                    cart.forEach((item, index) => {
                        total += (parseFloat(item.harga) * parseFloat(item.qty));
                    })
                    $('#subtotal, #tot').text(Format_Rupiah_Final(total))
                    $('#subtotal, #tot').append(`<input type="hidden" name="total" value="${total}">`)
                    
                    $('#navbarSupportedContent .ml-auto li').removeClass('border border-danger')
                    $('#navbarSupportedContent .ml-auto li .nav-link i').removeClass('text-danger')
                    $('#navbarSupportedContent .ml-auto li .nav-link small').removeClass('text-danger')
            } 
            if(id === 0){
                notFound();
            }
            
            
        }
        $(document).ready(function(){
            const jancok = localStorage.getItem('products');
            let cart = JSON.parse(jancok)
            if(jancok != null ){
                tableView(cart, cart.length)
            }else{
                notFound()
                console.log('jancok')
            }
        })
        $(document).on('click','.btnCalculation', function() {
            const datas = JSON.parse(localStorage.getItem('products'));
            let id = $(this).attr('data-id')
            if($(this).attr('data-type') == 'prev'){
                const datasS = datas.filter((item, i) => {
                    if(i == id){
                        if(item.qty <= 1 ){
                            const valid = confirm('Yakin ingin menghapus pesanan?')
                            if(valid){
                                validationDelete(datas,id)
                            }
                        } else {
                            item.qty = JSON.stringify(parseFloat(item.qty) - 1)
                        }
                        return item;
                    } else {
                        return item;
                    }
                })
                localStorage.setItem('products', JSON.stringify(datasS));
                tableView(datasS, datasS.length)
            }else{
                const datasS = datas.filter((item, i) => {
                    if(i == id){
                        item.qty = JSON.stringify(parseFloat(item.qty) + 1)
                        return item;
                    } else {
                        return item;
                    }
                })
                localStorage.setItem('products', JSON.stringify(datasS));
                tableView(datasS, datasS.length)
            }
        })
        $(document).on('click','.btnHapus', async function(){
            const valid = confirm('Yakin ingin menghapus pesanan?')
            if(valid){
                const datas = JSON.parse(localStorage.getItem('products'));
                const id = $(this).attr('data-id')
                const datasS = await datas.filter((item, i) => {
                    if(item.id !== id){
                        return item
                    }
                })
                if(datasS.length != 0){
                    localStorage.setItem('products', JSON.stringify(datasS));
                }else{
                    // localStorage.setItem('products', JSON.stringify(null));
                    notFound()
                    localStorage.removeItem('products');
                
                }
                tableView(datasS, datasS.length)
            }
            
            
        })
        function notFound(){
            return $('table tbody').html(`<tr>
                    <td><h5 class="mb-0 font-weight-bold">Pesanan belum di tambahkan</h5></td>
                </tr>`)
        }
        notFound()
        async function validationDelete(datas, id){
            const data_  = await datas.filter((item_, i_) => {
                if(i_ != id){
                    return item_
                }
            })
            localStorage.setItem('products', JSON.stringify(data_));
            tableView(data_, data_.length)
        }

        $("#submitPesanan").submit(function(e){
            e.preventDefault();
            const formdata = new FormData($('form')[0]);
              $.ajax({
                    url: '{{route("pesanan")}}',
                    type: 'POST',
                    data: formdata,
                    processData: false,
                    contentType: false,
                    dataType: 'JSON',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    beforeSend: function() {
                        $('#ButtonOrders').html(`
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        `);
                    },
                    success: function (data) { 
                        if(data.status === 200){
                            localStorage.removeItem("products");
                            notFound()
                            tableView(null, 0)
                            $('#Checkout').removeClass('active show')
                            $('#validasiSuccess').html(`
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Success!</strong> ${data.message}
                                    <p>Silahkan cek whatshApp Anda, untuk melanjutkan pembayaran</p>
                                </div>
                            `)
                            $('#tot,#subtotal').text(0)
                            $('#tot input').val(0)
                            $('#ButtonOrders').html(`Pesan sekarang`);
                            setTimeout(() => {
                                $('#validasiSuccess').empty()
                            },10000)
                        }
                        
                    }
                }); 
        });
    </script>
@endsection