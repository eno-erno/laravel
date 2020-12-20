<?php

use Illuminate\Support\Facades\Route;

// backend 
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BackgroundController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PopupController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\WidgetsController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\TestimonyController;
use App\Http\Controllers\Admin\PhotogalleryController;
use App\Http\Controllers\Admin\BannerpromoController;
use App\Http\Controllers\Admin\BannersliderController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\AdminauthController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController as Products;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/produk', [Products::class, 'index']);
Route::post('/pesanan', [Products::class, 'pesanan'])->name('pesanan');
Route::get('/detail-pesanan', [Products::class, 'detail_cart']);
Route::get('/detail-produk/{code}', [Products::class, 'detail_produk']);
Route::get('/kategori/{id}', [Products::class, 'kategori']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/widgets', [WidgetsController::class, 'index']);


    // admin product
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/create-product', [ProductController::class, 'create']);
    Route::post('/store-product', [ProductController::class, 'store']);
    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::post('/update-product/{id}', [ProductController::class, 'update']);
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy']);
    Route::get('/delete-datail-gambar/{id}/{data}', [ProductController::class, 'delete_gambar']);


    // admin brand 
    Route::get('/brand', [BrandController::class, 'index']);
    Route::get('/create-brand', [BrandController::class, 'create']);
    Route::post('/store-brand', [BrandController::class, 'store']);
    Route::get('/edit-brand/{id}', [BrandController::class, 'edit']);
    Route::post('/update-brand/{id}', [BrandController::class, 'update']);
    Route::get('/delete-brand/{id}', [BrandController::class, 'destroy']);

    // admin about 
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/create-about', [AboutController::class, 'create']);
    Route::post('/store-about', [AboutController::class, 'store']);
    Route::get('/edit-about/{id}', [AboutController::class, 'edit']);
    Route::post('/update-about/{id}', [AboutController::class, 'update']);
    Route::get('/delete-about/{id}', [AboutController::class, 'destroy']);

    // admin Background 
    Route::get('/background', [BackgroundController::class, 'index']);
    Route::get('/create-background', [BackgroundController::class, 'create']);
    Route::post('/store-background', [BackgroundController::class, 'store']);
    Route::get('/edit-background/{id}', [BackgroundController::class, 'edit']);
    Route::post('/update-background/{id}', [BackgroundController::class, 'update']);
    Route::get('/delete-background/{id}', [BackgroundController::class, 'destroy']);


     // admin category prduct 
    Route::get('/kategori-produk', [CategoryProductController::class, 'index']);
    Route::get('/create-kategori-produk', [CategoryProductController::class, 'create']);
    Route::post('/store-kategori-produk', [CategoryProductController::class, 'store']);
    Route::get('/edit-kategori-produk/{id}', [CategoryProductController::class, 'edit']);
    Route::post('/update-kategori-produk/{id}', [CategoryProductController::class, 'update']);
    Route::get('/delete-kategori-produk/{id}', [CategoryProductController::class, 'destroy']);


      // admin contact 
    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/create-contact', [ContactController::class, 'create']);
    Route::post('/store-contact', [ContactController::class, 'store']);
    Route::get('/edit-contact/{id}', [ContactController::class, 'edit']);
    Route::post('/update-contact/{id}', [ContactController::class, 'update']);
    Route::get('/delete-contact/{id}', [ContactController::class, 'destroy']);

    // admin media 
    Route::get('/media-sosial', [MediaController::class, 'index']);
    Route::get('/create-media-sosial', [MediaController::class, 'create']);
    Route::post('/store-media-sosial', [MediaController::class, 'store']);
    Route::get('/edit-media-sosial/{id}', [MediaController::class, 'edit']);
    Route::post('/update-media-sosial/{id}', [MediaController::class, 'update']);
    Route::get('/delete-media-sosial/{id}', [MediaController::class, 'destroy']);

    // admin member  
    Route::get('/member', [MemberController::class, 'index']);
    Route::get('/create-member', [MemberController::class, 'create']);
    Route::get('/store-member', [MemberController::class, 'store']);
    Route::get('/edit-member', [MemberController::class, 'edit']);
    Route::get('/update-member', [MemberController::class, 'update']);
    Route::get('/delete-member', [MemberController::class, 'destroy']);

    // admin order 
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/create-order', [OrderController::class, 'create']);
    Route::get('/store-order', [OrderController::class, 'store']);
    Route::get('/edit-order', [OrderController::class, 'edit']);
    Route::get('/update-order', [OrderController::class, 'update']);
    Route::get('/delete-order', [OrderController::class, 'destroy']);
    Route::get('/price-produk', [OrderController::class, 'price']);
    Route::get('/city-d', [OrderController::class, 'city_d']);

     // admin popup 
    Route::get('/popup', [PopupController::class, 'index']);
    Route::get('/create-popup', [PopupController::class, 'create']);
    Route::post('/store-popup', [PopupController::class, 'store']);
    Route::get('/edit-popup/{id}', [PopupController::class, 'edit']);
    Route::post('/update-popup/{id}', [PopupController::class, 'update']);
    Route::get('/delete-popup/{id}', [PopupController::class, 'destroy']);

    // admin shipping 
    Route::get('/shipping', [ShippingController::class, 'index']);
    Route::get('/create-shipping', [ShippingController::class, 'create']);
    Route::get('/store-shipping', [ShippingController::class, 'store']);
    Route::get('/edit-shipping', [ShippingController::class, 'edit']);
    Route::get('/update-shipping', [ShippingController::class, 'update']);
    Route::get('/delete-shipping', [ShippingController::class, 'destroy']);

    
    Route::get('/status', [StatusController::class, 'index']);
    Route::get('/create-status', [StatusController::class, 'create']);
    Route::get('/store-status', [StatusController::class, 'store']);
    Route::get('/edit-status', [StatusController::class, 'edit']);
    Route::get('/update-status', [StatusController::class, 'update']);
    Route::get('/delete-status', [StatusController::class, 'destroy']);


    Route::get('/testimoni', [TestimonyController::class, 'index']);

    // admin logo 
    Route::get('/logo', [LogoController::class, 'index']);
    Route::get('/create-logo', [LogoController::class, 'create']);
    Route::post('/store-logo', [LogoController::class, 'store']);
    Route::get('/edit-logo/{id}', [LogoController::class, 'edit']);
    Route::post('/update-logo/{id}', [LogoController::class, 'update']);
    Route::get('/delete-logo/{id}', [LogoController::class, 'destroy']);

    // admin Jadwal 
    Route::get('/jadwal', [ScheduleController::class, 'index']);
    Route::post('/store-jadwal', [ScheduleController::class, 'store']);
    Route::get('/edit-jadwal/{id}', [ScheduleController::class, 'edit']);
    Route::post('/update-jadwal/{id}', [ScheduleController::class, 'update']);
    Route::get('/delete-jadwal/{id}', [ScheduleController::class, 'destroy']);

    // admin Testimoni 
    Route::get('/testimoni', [TestimonyController::class, 'index']);
    Route::get('/create-testimoni', [TestimonyController::class, 'create']);
    Route::post('/store-testimoni', [TestimonyController::class, 'store']);
    Route::get('/edit-testimoni/{id}', [TestimonyController::class, 'edit']);
    Route::post('/update-testimoni/{id}', [TestimonyController::class, 'update']);
    Route::get('/delete-testimoni/{id}', [TestimonyController::class, 'destroy']);

    // admin Testimoni 
    Route::get('/photo-gallery', [PhotogalleryController::class, 'index']);
    Route::get('/create-photo-gallery', [PhotogalleryController::class, 'create']);
    Route::post('/store-photo-gallery', [PhotogalleryController::class, 'store']);
    Route::get('/edit-photo-gallery/{id}', [PhotogalleryController::class, 'edit']);
    Route::post('/update-photo-gallery/{id}', [PhotogalleryController::class, 'update']);
    Route::get('/delete-photo-gallery/{id}', [PhotogalleryController::class, 'destroy']);

    // admin Banner Promo 
    Route::get('banner-promo', [BannerpromoController::class, 'index']);
    Route::get('/create-banner-promo', [BannerpromoController::class, 'create']);
    Route::post('/store-banner-promo', [BannerpromoController::class, 'store']);
    Route::get('/edit-banner-promo/{id}', [BannerpromoController::class, 'edit']);
    Route::post('/update-banner-promo/{id}', [BannerpromoController::class, 'update']);
    Route::get('/delete-banner-promo/{id}', [BannerpromoController::class, 'destroy']);

    // admin slider
    Route::get('/slider', [BannersliderController::class, 'index']);
    Route::get('/create-slider', [BannersliderController::class, 'create']);
    Route::post('/store-slider', [BannersliderController::class, 'store']);
    Route::get('/edit-slider/{id}', [BannersliderController::class, 'edit']);
    Route::post('/update-slider/{id}', [BannersliderController::class, 'update']);
    Route::get('/delete-slider/{id}', [BannersliderController::class, 'destroy']);

    // admin Color
    Route::get('/warna', [ColorController::class, 'index']);
    Route::post('/update-warna/{id}', [ColorController::class, 'update']);

  // admin auth
    Route::get('/akun', [AdminauthController::class, 'index']);
    Route::get('/create-akun', [AdminauthController::class, 'create']);
    Route::post('/store-akun', [AdminauthController::class, 'store']);
    Route::get('/edit-akun/{id}', [AdminauthController::class, 'edit']);
    Route::post('/update-akun/{id}', [AdminauthController::class, 'update']);
    Route::get('/delete-akun/{id}', [AdminauthController::class, 'destroy']);

    Route::get('/laporan', [ReportController::class, 'index']);
    Route::get('/laporan-penjualan', [ReportController::class, 'laporan_penjualan']);
    Route::get('/laporan-produk', [ReportController::class, 'laporan_produk']);
    Route::get('/laporan-order-sukses', [ReportController::class, 'laporan_order_sukses']);
    Route::get('/laporan-order-gagal', [ReportController::class, 'laporan_order_gagal']);
});
