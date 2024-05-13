<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiiTietDonHang extends Model
{
    use HasFactory;
    protected $table = 'chii_tiet_don_hangs';
    protected $fillable = [
        'id_khach_hang',
        'id_san_pham',
        'so_luong',
        'don_gia',
        'thanh_tien',
        'tong_khuyen_mai',
        'id_hoa_don',
        'ghi_chu',
        'is_giao_kho'
    ];
}
