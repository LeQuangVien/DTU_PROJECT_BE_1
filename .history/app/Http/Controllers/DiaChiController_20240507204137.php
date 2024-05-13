<?php

namespace App\Http\Controllers;

use App\Models\DiaChi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaChiController extends Controller
{
    public function diachiDonHang(Request $request)
    {
        $khachHang = Auth::guard('sanctum')->user();
        DiaChi::create([
            'id_khach_hang' => $khach_hang->id,
            'ten_nguoi_nhan' => $request->ten_nguoi_nhan,
            'so_dien_thoai' => $request->dia_chi,
            'dia_chi' =>  $request->dia_chi,
            'email' =>  $request->email,
            'ghi_chu' =>  $request->email,
        ])
    }
}
