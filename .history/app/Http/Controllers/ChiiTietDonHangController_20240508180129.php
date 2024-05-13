<?php

namespace App\Http\Controllers;

use App\Models\ChiiTietDonHang;
use App\Models\GioHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChiiTietDonHangController extends Controller
{
    public function themVaoGioHang(Request $request)
    {
        $khachhang = Auth::guard('sanctum')->user();
        $sanpham = SanPham::where('id', $request->id_san_pham)->first();
        if ($sanpham) {
            if ($sanpham->gia_khuyen_mai > 0) {
                $dongia = $sanpham->gia_khuyen_mai;
            } else {
                $dongia = $sanpham->gia_ban;
            }
            $tim = ChiiTietDonHang::where('id_khach_hang', $khachhang->id)
                ->where('id_san_pham', $sanpham->id)
                ->whereNull('id_hoa_don')
                ->first();
            if ($tim) {
                $tim->so_luong   = $tim->so_luong + 1;
                $tim->thanh_tien = $tim->so_luong * $dongia;
                $tim->save();
            } else {
                ChiiTietDonHang::create([
                    'id_khach_hang'     => $khachhang->id,
                    'id_san_pham'       => $sanpham->id,
                    'don_gia'           => $dongia,
                    'thanh_tien'        => $dongia * 1,
                ]);
            }
            return response()->json([
                'status' => true,
                'message' => "Sản phẩm đã được thêm vào giỏ hàng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra!"
            ]);
        }
    }
    public function selectGioHang()
    {
        $khachhang = Auth::guard('sanctum')->user();
        $data = ChiiTietDonHang::where('id_khach_hang', $khachhang->id)
            ->join('san_phams', 'san_phams.id', 'chii_tiet_don_hangs.id_san_pham')
            ->select('san_phams.hinh_anh', 'san_phams.ten_san_pham', 'chii_tiet_don_hangs.*')
            ->whereNull('id_hoa_don')->get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function updateGioHang(Request $request)
    {
        $khachhang = Auth::guard('sanctum')->user();
        $giohang = ChiiTietDonHang::where('id', $request->id)->where('id_khach_hang', $khachhang->id)->first();
        if ($giohang) {
            $giohang->so_luong     = $request->so_luong;
            $giohang->thanh_tien   = $request->so_luong * $giohang->don_gia;
            $giohang->ghi_chu      = $request->ghi_chu;
            $giohang->save();
            return response()->json([
                'status' => true,
                'message' => "Đã cập nhật giỏ hàng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => "Đã cập nhật giỏ hàng thành công!"
            ]);
        }
    }
    public function destroid(Request $request)
    {
        $khachhang = Auth::guard('sanctum')->user();
        $giohang = ChiiTietDonHang::where('id', $request->id)->where('id_khach_hang', $khachhang->id)->first();
        if ($giohang) {
            $giohang->delete();
            return response()->json([
                'status' => true,
                'message' => "Sản phẩm đã được xóa khỏi vào giỏ hàng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra!"
            ]);
        }
    }

    public function listChon(Request $request)
    {
        $khach_hang = Auth::guard('sanctum')->user();
        $dia_chi = DiaChi::where('id', $request->id_dia_chi)->where('id_khach_hang', $khach_hang->id)->first();

        if (!$dia_chi) {
            return response()->json([
                'status' => false,
                'message' => "Bạn chưa chọn địa chỉ mà"
            ]);
        } else if (count($request->ds_mua_sp) < 1) {
            return response()->json([
                'status' => false,
                'message' => "Bạn dã chọn sản phẩm nào đâu mà mua"
            ]);
        } else {
            $don_hang = DonHang::create([
                'ma_don_hang'               => "Lát nữa tính sau",
                'tong_tien_thanh_toan'      => 0,
                'is_thanh_toan'             => 0,   //Khong cần viết dòng nãy cũng được
                'tinh_trang_don_hang'       => 0,   //Khong cần viết dòng nãy cũng được
                'ten_nguoi_nhan'            => $dia_chi->ten_nguoi_nhan,
                'so_dien_thoai'             => $dia_chi->so_dien_thoai,
                'dia_chi_giao_hang'         => $dia_chi->dia_chi,
                'is_giao_kho'               => 0,   //Khong cần viết dòng nãy cũng được
                'id_khach_hang'             => $khach_hang->id
            ]);

            $ma_don_hang = "HDBH" . (101086 + $don_hang->id);
            $tong_tien_thanh_toan = 0;
            foreach ($request->ds_mua_sp as $key => $value) {
                $tong_tien_thanh_toan += $value['thanh_tien'];
                ChiTietDonHang::where('id', $value['id'])->update([
                    'id_hoa_don'    => $don_hang->id,
                ]);
            };

            $don_hang->ma_don_hang = $ma_don_hang;
            $don_hang->tong_tien_thanh_toan = $tong_tien_thanh_toan;
            $don_hang->save();

            $link   =   "https://img.vietqr.io/image/MB-1910061030119-qr_only.png?amount=" . $tong_tien_thanh_toan . "&addInfo=" . $ma_don_hang;

            // Gửi Email
            $bien_1['ten_nguoi_nhan']           =   $dia_chi->ten_nguoi_nhan;
            $bien_1['so_dien_thoai_nhan']       =   $dia_chi->so_dien_thoai;
            $bien_1['dia_chi_nhan_hang']        =   $dia_chi->dia_chi;
            $bien_1['tong_tien_thanh_toan']     =   $tong_tien_thanh_toan;
            $bien_1['link_qr_code']             =   $link;
            $bien_2                             =   $request->ds_mua_sp;

            Mail::to($khach_hang->email)->send(new XacNhanDonHangMail($bien_1, $bien_2));

            return response()->json([
                'status' => true,
                'message' => "Đặt đơn hàng thành công"
            ]);
        }
    }
}
