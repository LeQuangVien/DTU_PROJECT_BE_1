<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function create(Request $request)
    {
        $tai_khoan = KhachHang::create([
            'email'  => $request->email,
            'so_dien_thoai'  => $request->so_dien_thoai,
            'ho_va_ten'  => $request->ho_va_ten,
            'password'  =>  bcrypt($request->password),
        ]);
    }
}
