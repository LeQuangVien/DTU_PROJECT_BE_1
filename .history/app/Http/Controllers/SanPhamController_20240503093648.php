<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function select()
    {
        SanPham::select('hinh_anh','ten_san_pham','gia_khuyen_mai')
    }
}
