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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanans')->onDelete('cascade');
            $table->string('kode_pembayaran')->unique();
            $table->string('no_ewallet');
            $table->decimal('total_pembayaran', 10, 2);
            $table->enum('status_bayar', ['belum_bayar', 'menunggu_verifikasi', 'sukses', 'gagal']);
            $table->timestamp('tanggal_bayar')->nullable();
            $table->text('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
