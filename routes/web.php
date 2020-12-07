<?php

use Illuminate\Support\Facades\Route;
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

use App\Http\Controllers\frontend\HomeController;

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
    Route::get('/store-product', [ProductController::class, 'store']);
    Route::get('/edit-product', [ProductController::class, 'edit']);
    Route::get('/update-product', [ProductController::class, 'update']);
    Route::get('/delete-product', [ProductController::class, 'destroy']);

    // admin brand 
    Route::get('/brand', [ProductController::class, 'index']);
    Route::get('/create-brand', [ProductController::class, 'create']);
    Route::get('/store-brand', [ProductController::class, 'store']);
    Route::get('/edit-brand', [ProductController::class, 'edit']);
    Route::get('/update-brand', [ProductController::class, 'update']);
    Route::get('/delete-brand', [ProductController::class, 'destroy']);

    // admin about 
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/create-about', [AboutController::class, 'create']);
    Route::get('/store-about', [AboutController::class, 'store']);
    Route::get('/edit-about', [AboutController::class, 'edit']);
    Route::get('/update-about', [AboutController::class, 'update']);
    Route::get('/delete-about', [AboutController::class, 'destroy']);

    // admin Background 
    Route::get('/background', [BackgroundController::class, 'index']);
    Route::get('/create-background', [BackgroundController::class, 'create']);
    Route::get('/store-background', [BackgroundController::class, 'store']);
    Route::get('/edit-background', [BackgroundController::class, 'edit']);
    Route::get('/update-background', [BackgroundController::class, 'update']);
    Route::get('/delete-background', [BackgroundController::class, 'destroy']);


     // admin category prduct 
    Route::get('/kategori-produk', [CategoryProductController::class, 'index']);
    Route::get('/create-kategori-produk', [CategoryProductController::class, 'create']);
    Route::get('/store-kategori-produk', [CategoryProductController::class, 'store']);
    Route::get('/edit-kategori-produk', [CategoryProductController::class, 'edit']);
    Route::get('/update-kategori-produk', [CategoryProductController::class, 'update']);
    Route::get('/delete-kategori-produk', [CategoryProductController::class, 'destroy']);


      // admin contact 
    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/create-contact', [ContactController::class, 'create']);
    Route::get('/store-contact', [ContactController::class, 'store']);
    Route::get('/edit-contact', [ContactController::class, 'edit']);
    Route::get('/update-contact', [ContactController::class, 'update']);
    Route::get('/delete-contact', [ContactController::class, 'destroy']);

    // admin media 
    Route::get('/media', [MediaController::class, 'index']);
    Route::get('/create-media', [MediaController::class, 'create']);
    Route::get('/store-media', [MediaController::class, 'store']);
    Route::get('/edit-media', [MediaController::class, 'edit']);
    Route::get('/update-media', [MediaController::class, 'update']);
    Route::get('/delete-media', [MediaController::class, 'destroy']);

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

     // admin popup 
    Route::get('/popup', [PopupController::class, 'index']);
    Route::get('/create-popup', [PopupController::class, 'create']);
    Route::get('/store-popup', [PopupController::class, 'store']);
    Route::get('/edit-popup', [PopupController::class, 'edit']);
    Route::get('/update-popup', [PopupController::class, 'update']);
    Route::get('/delete-popup', [PopupController::class, 'destroy']);

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


});
