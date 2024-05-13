<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
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
        $data = SanPham::where('id_danh_muc',$id)->where('tinh_trang',1)->get();
        $danhmuc = DanhMuc::where('id',$id)->first();
        
    }
}
