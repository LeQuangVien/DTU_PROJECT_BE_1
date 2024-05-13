<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function store()
    {
        $title = SanPham::take(3)->get();
        $data =  SanPham::get();
        return response()->json([
            'data' => $data,
            't'
        ]);
    }
}
