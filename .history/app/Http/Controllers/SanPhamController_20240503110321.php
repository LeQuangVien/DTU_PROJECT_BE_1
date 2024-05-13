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
        $data =  SanPham::get();
        return response()->json([
            'data' => $data,
            'title' => $title
        ]);
    }
}
