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
        Schema::create('harga_angkut', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id')->nullable(); // untuk relasi jika perlu
            $table->string('kode_barang', 100)->nullable()->unique(); // opsional
            $table->string('jenis_barang', 100); // dari jenis_barang
            $table->string('satuan')->nullable();
            $table->float('berat')->default(0);
            $table->string('dimensi')->nullable(); // contoh: 30x40x50 cm
            $table->text('catatan')->nullable();
            $table->integer('harga')->nullable(); // nilai harga ditentukan kemudian
            $table->integer('by_kawal')->nullable();
            $table->timestamps();

            $table->foreign('pemesanan_id')->references('id')->on('pemesanan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harga_angkut');
    }
};
