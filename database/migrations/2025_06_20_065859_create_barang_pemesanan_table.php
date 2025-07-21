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
        Schema::create('barang_pemesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id');
            $table->string('jenis_barang');
            $table->float('berat')->default(0);
            $table->string('dimensi')->nullable(); // contoh: 30x40x50 cm
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('barang_pemesanan');
    }
};
