<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrangChu extends Controller
{
    public function themVaoGioHang()
    {
        $khachhang = Auth::guard('sanctum')->user();
        $sanpham = SanPham::where('id',)
    }
}
