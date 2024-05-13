<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrangChu extends Controller
{
    public function themVaoGioHang()
    {
        $khachhang = Auth::guard('sanctum')->user();

        
    }
}
