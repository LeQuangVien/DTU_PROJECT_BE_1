<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function store()
    {
        $list_ban_chay = SanPham::orderByDESC('gia_khuyen_mai')
            ->take(3)
            ->get();
        $listSanPhamBanChay         = SanPham::orderByDESC('gia_ban')
            ->take(12)
            ->get();
        $listSanPhamMoi             = SanPham::orderByDESC('id')
            ->take(12)
            ->get();
        $listSanPhamSoLuongNhieu    = SanPham::orderByDESC('so_luong')
            ->take(10)
            ->get();
        $listChiTiet = SanPham::orderByDESC('gia_ban')
        return response()->json([
            'listSanPhamBanChay' => $listSanPhamBanChay,
            'list_ban_chay' => $list_ban_chay,
            'listSanPhamMoi' => $listSanPhamMoi,
            'listSanPhamSoLuongNhieu' => $listSanPhamSoLuongNhieu
        ]);
    }
    public function chiTietSanPham($id)
    {
        $sanPham = SanPham::where('id', $id)->first();
        if ($sanPham) {
            return response()->json([
                'status'  => true,
                'data'    => $sanPham
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => "Không có sản phẩm!"
            ]);
        }
    }
}
