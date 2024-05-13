<?php

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/trang-chu/san-pham/select', [SanPhamController::class, 'store']);
Route::get('/san-pham/{id}', [SanPhamController::class, 'chiTietSanPham']);


Route::get('/danh-muc/selectDanhmuc', [DanhMucController::class, 'storeDanhmuc']);
Route::get('/danh-muc/danh-sach-san-pham/{id}', [DanhMucController::class, 'dataDanhSachSanPham']);


// Khách Hàng
Route::


