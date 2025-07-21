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
        Schema::create('tracking_pengiriman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id');
            $table->string('subject'); // contoh: Barang Diterima, Dalam Proses Pengiriman
            $table->text('keterangan')->nullable(); // penjelasan status
            $table->timestamp('waktu')->useCurrent();
            $table->timestamps();

            $table->foreign('pemesanan_id')
                ->references('id')
                ->on('pemesanan')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracking_pengiriman');
    }
};
