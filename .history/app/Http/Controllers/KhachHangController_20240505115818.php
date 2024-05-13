<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function create(Request $request)
    {
        $tai_khoan = KhachHang::create([
            'email'  =>
        ]);
    }
}
