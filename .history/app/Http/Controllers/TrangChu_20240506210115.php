<?php

namespace App\Http\Controllers;

use App\Models\ChiiTietDonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrangChu extends Controller
{
    public function themVaoGioHang(Request $request)
    {
        $khachhang = Auth::guard('sanctum')->user();
        $sanpham = SanPham::where('id', $request->id_san_pham)->first();
        if ($sanpham) {
            if ($sanpham->gia_khuyen_mai > 0) {
                $dongia = $sanpham->gia_khuyen_mai;
            } else {
                $dongia = $sanpham->gia_ban;
            }
            $tim = ChiiTietDonHang::where('id_khach_hang', $khachhang->id)
                ->where('id_san_pham', $sanpham->id)
                ->whereNull('id_hoa_don')
                ->first();
            if ($tim) {
                $tim->so_luong   = $tim->so_luong + 1;
                $tim->thanh_tien = $tim->so_luong * $dongia;
                $tim->save();
            } else {
                ChiiTietDonHang::create([
                    'id_khach_hang'     => $khachhang->id,
                    'id_san_pham'       => $sanpham->id,
                    'don_gia'           => $dongia,
                    'thanh_tien'        => $dongia * 1,
                ]);
            }
            return response()->json([
                'status' => true,
                'message' => "Sản phẩm đã được thêm vào giỏ hàng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra!"
            ]);
        }
    }
    public function selectGioHang()
    {
        $khachhang = Auth::guard('sanctum')->user();
        
    }
}
