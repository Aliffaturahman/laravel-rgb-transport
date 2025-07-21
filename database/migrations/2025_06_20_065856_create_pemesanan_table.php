<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pemesanan')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->unsignedBigInteger('kendaraan_id')->nullable();

            $table->string('nama_pengirim');
            $table->string('telepon_pengirim', 20);
            $table->string('nama_tempat_pengirim');
            $table->text('alamat_pengirim');

            $table->string('kota_pengirim');
            $table->string('provinsi_pengirim');
            $table->string('kode_pos_pengirim', 10);

            $table->string('nama_penerima');
            $table->string('telepon_penerima', 20);
            $table->string('nama_tempat_penerima');
            $table->text('alamat_penerima');

            $table->string('kota_penerima');
            $table->string('provinsi_penerima');
            $table->string('kode_pos_penerima', 10);

            $table->bigInteger('biaya')->default(0);
            $table->string('status')->default('menunggu');

            $table->timestamps();

            $table->foreign('kendaraan_id')
                ->references('id')
                ->on('kendaraan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
