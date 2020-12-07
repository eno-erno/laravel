<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WidgetsController extends Controller
{
    public function index()
    {
         return view('backend/admin/content-pages/widgets.index');
    }
}
