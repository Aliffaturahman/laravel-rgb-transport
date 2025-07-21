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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pelanggan', 100)->unique();
            $table->string('nama_pelanggan', 100);
            $table->string('kontak', 100)->nullable();
            $table->string('alamat1', 255);
            $table->string('alamat2', 255)->nullable();
            $table->string('kota', 100);
            $table->string('telepon', 100)->nullable();
            $table->string('fax', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
