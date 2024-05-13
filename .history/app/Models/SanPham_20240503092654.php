<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_phams';
    protected $fillable = [
        $table->string('ten_san_pham');
        $table->string('slug_san_pham');
        $table->text('hinh_anh');
        $table->integer('gia_ban');
        $table->integer('gia_khuyen_mai');
        $table->string('mo_ta');
        $table->integer('id_danh_muc')->nullable();
        $table->integer('tinh_trang');
        $table->string('mo_ta_chi_tiet');
        $table->integer('so_luong');
        $table->timestamps();
    ]
}
