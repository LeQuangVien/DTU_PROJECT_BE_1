<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function storeDanhmuc()
    {
        $data = DanhMuc::where('tinh_trang', 1)->get();
        return response()->json([
            'data'   => $data
        ]);
    }
    public function dataDanhSachSanPham($id){
        $data = DanhMuc::where('id_danh_muc',1)
    }
}
