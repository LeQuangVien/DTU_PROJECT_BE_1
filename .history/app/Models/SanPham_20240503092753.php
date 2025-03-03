<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_phams';
    protected $fillable = [
        'ten_san_pham',
        'slug_san_pham',
        'hinh_anh',
        'gia_ban',
        'gia_khuyen_mai',
        'mo_ta',
        'id_danh_muc',
        'tinh_trang',
        'mo_ta_chi_tiet',

    ];
}
