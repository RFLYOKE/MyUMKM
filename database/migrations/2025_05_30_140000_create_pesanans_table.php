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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('alamat_pengiriman_id')->constrained('alamat_pengirims')->onDelete('cascade');
            $table->decimal('total_harga', 10, 2);
            $table->decimal('total_ongkos_kirim', 10, 2);
            $table->decimal('biaya_jasa_aplikasi', 10, 2);
            $table->decimal('biaya_layanan', 10, 2);
            $table->decimal('total_biaya', 10, 2);
            $table->enum('metode_pembayaran', ['gopay', 'ovo', 'shopee_pay', 'dana']);
            $table->enum('status_pesanan', ['pending', 'diproses', 'dikirim', 'selesai', 'batal']);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
