<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function index()
    {
        return view('trangChu');
    }
}
