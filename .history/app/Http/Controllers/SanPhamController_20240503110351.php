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
        ->take(10)
        ->get();
        return response()->json([
            'listSanPhamBanChay' => $listSanPhamBanChay,
            'list_ban_chay' => $list_ban_chay
        ]);
    }
}
