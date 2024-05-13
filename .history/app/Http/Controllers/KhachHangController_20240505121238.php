<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if ($tai_khoan) {
            return response()->json([
                'status' => true,
                'message' => "Đăng Kí Tài Khoản Thành Công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }

    public function login(Request $request)
    {
        $check = Auth::guard('khach_hang')->attempt([
            'email'   => $request->email,
            'password' => $request->password
        ]);
        if ($check) {
            $user = Auth::guard('khach_hang')->user();
            if($user->is_active == 0){
                
            }
        }
    }
}
