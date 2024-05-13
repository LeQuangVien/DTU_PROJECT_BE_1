<?php

namespace App\Http\Controllers;

use App\Models\DiaChi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaChiController extends Controller
{
    public function diachiDonHang()
    {
        $khachHang = Auth::guard('sanctum')->user();
        DiaChi::create([
            ''
        ])
    }
}
