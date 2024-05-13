<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiiTietDonHang extends Model
{
    use HasFactory;
    protected $table = 'chii_tiet_don_  hangs';
    protected $fillable = [
        'id_khach_hang',
        'id_san_pham',
        'so_luong',
        'don_gia',
        'thanh_tien',
        'id_hoa_don',
        'ghi_chu',
        'is_giao_kho'
    ];
}
