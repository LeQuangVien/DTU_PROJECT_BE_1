<?php

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/trang-chu/san-pham/select', [SanPhamController::class, 'store']);
Route::get('/san-pham/{id}', [SanPhamController::class, 'chiTietSanPham']);


Route::get('/danh-muc/selectDanhmuc', [DanhMucController::class, 'storeDanhmuc']);
Route::get('/danh-muc/danh-sach-san-pham/{id}', [DanhMucController::class, 'dataDanhSachSanPham']);


// Khách Hàng
Route::post('/khach-hang/dang-ky', [KhachHangController::class, 'create']);
Route::post('/khach-hang/dang-nhap', [KhachHangController::class, 'loginn']);
Route::post('/khach-hang/check-login', [KhachHangController::class, 'checkLogin']);

//TrangChu
Route::post('/trang-chu/them-vao-gio-hang', [T])
