<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_khach_hang');
            $table->integer('id_san_pham');
            $table->integer('id_chi_tiet_don_hang');
            $table->integer('id_chi_tiet_don_hang');
            $table->integer('don_gia');
            $table->integer('thanh_tien');
            $table->integer('id_hoa_don')->nullable();
            $table->string('ghi_chu')->nullable();
            $table->integer('is_giao_kho')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gio_hangs');
    }
};
