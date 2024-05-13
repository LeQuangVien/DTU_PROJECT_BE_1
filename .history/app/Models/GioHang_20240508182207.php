<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    protected $table = 'gio_hangs';
    protected $fillable = [
        'id_khach_hang',
        'id_san_pham',
        'id_chi_tiet_don_hang',
        'so_luong',
        'don_gia',
        'thanh_tien',
        'id_hoa_don',
        'ghi_chu',
        'is_giao_kho',
        'is_gio_hang'
    ];
}
