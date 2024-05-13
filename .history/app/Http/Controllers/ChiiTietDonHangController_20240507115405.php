<?php

namespace App\Http\Controllers;

use App\Models\ChiiTietDonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChiiTietDonHangController extends Controller
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
        $data = ChiiTietDonHang::where('id_khach_hang', $khachhang->id)
            ->join('san_phams', 'san_phams.id', 'chii_tiet_don_hangs.id_san_pham')
            ->select('san_phams.hinh_anh', 'san_phams.ten_san_pham', 'chii_tiet_don_hangs.*')
            ->whereNull('id_hoa_don')->get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function updateGioHang(Request $request)
    {
        $khachhang = Auth::guard('sanctum')->user();
        $giohang = ChiiTietDonHang::where('id', $request->id)->where('id_khach_hang', $khachhang->id)->first();
        if ($giohang) {
            $giohang->so_luong     = $request->so_luong;
            $giohang->thanh_tien   = $request->so_luong * $giohang->don_gia;
            $giohang->tong_khuyen_mai = $request->thanh_tien - 
            $giohang->ghi_chu      = $request->ghi_chu;
            $giohang->save();
            return response()->json([
                'status' => true,
                'message' => "Đã cập nhật giỏ hàng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => "Đã cập nhật giỏ hàng thành công!"
            ]);
        }
    }
    public function destroid(Request $request)
    {
        $khachhang = Auth::guard('sanctum')->user();
        $giohang = ChiiTietDonHang::where('id', $request->id)->where('id_khach_hang', $khachhang->id)->first();
        if ($giohang) {
            $giohang->delete();
            return response()->json([
                'status' => true,
                'message' => "Sản phẩm đã được xóa khỏi vào giỏ hàng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra!"
            ]);
        }
    }
}
