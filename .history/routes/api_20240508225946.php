<?php

use App\Http\Controllers\ChiiTietDonHangController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DiaChiController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\TrangChu;
use App\Models\ChiiTietDonHang;
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
Route::post('/trang-chu/them-vao-gio-hang', [ChiiTietDonHangController::class, 'themVaoGioHang']);
Route::get('/trang-chu/select-gio-hang', [ChiiTietDonHangController::class, 'selectGioHang']);
Route::post('/trang-chu/update-gio-hang', [ChiiTietDonHangController::class, 'updateGioHang']);
Route::post('/trang-chu/xoa-gio-hang', [ChiiTietDonHangController::class, 'destroid']);
Route::post('/gio-hang/list-chon-san-pham', [ChiiTietDonHangController::class, 'listChon']);
Route::get('/gio-hang/gio-hang/thanh-toan', [ChiiTietDonHangController::class, 'giohang']);
Route::get('/gio-hang/gio-hang/thanh-toan', [ChiiTietDonHangController::class, 'giohang']);

//DiaChi
Route::post('dia-chi/Khach-Hang/tao-dia-chi-dat-hang', [DiaChiController::class, 'diachiDonHang']);
