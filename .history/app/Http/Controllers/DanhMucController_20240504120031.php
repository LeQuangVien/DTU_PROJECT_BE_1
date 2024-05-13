<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function store()
    {
        $data = DanhMuc::where('tinh_trang', 1)->get();
        return response()->json([
            'data'   => $data
        ]);
    }
}
