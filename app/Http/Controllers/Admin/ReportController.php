<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Brand;
use App\Models\Category_product;

class ReportController extends Controller
{

    public function index()
    {

        return view('backend/admin/content-pages/report.index');
    }

    public function laporan_penjualan()
    {
        return view('backend/admin/content-pages/report.laporan_penjualan');
    }

    public function laporan_produk()
    {
        $dataProduct = Product::all();
        return view('backend/admin/content-pages/report.laporan_produk', compact('dataProduct'));
    }

    public function laporan_order_sukses()
    {
        return view('backend/admin/content-pages/report.order_sukses');
    }

    public function laporan_order_gagal()
    {
        return view('backend/admin/content-pages/report.order_gagal');
    }

}
