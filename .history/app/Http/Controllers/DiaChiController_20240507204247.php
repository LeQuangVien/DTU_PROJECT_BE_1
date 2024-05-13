<?php

namespace App\Http\Controllers;

use App\Models\DiaChi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaChiController extends Controller
{
    public function diachiDonHang(Request $request)
    {
        try {
            $khachHang = Auth::guard('sanctum')->user();
            DiaChi::create([
                'id_khach_hang' => $khachHang->id,
                'ten_nguoi_nhan' => $request->ten_nguoi_nhan,
                'so_dien_thoai' => $request->so_dien_thoai,
                'dia_chi' =>  $request->dia_chi,
                'email' =>  $request->email,
                'ghi_chu' =>  $request->ghi_chu,
            ]);
            return response()->json([
                'status' => true,
                'message' => "Bạn đã thêm mới địa chỉ thành công!"
            ]);
        } catch (Exceptiontion) {
            return response()->json([
                'status'=> false,
                'message' => "Có lỗi xảy ra!"
            ]);
        }
    }
}
