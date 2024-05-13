<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function create(req)
    {
        $tai_khoan = KhachHang::create([
            'email'  =>
        ]);
    }
}
