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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->string('kontak')->nullable();
            $table->string('alamat1')->nullable();
            $table->string('alamat2')->nullable();
            $table->string('kota')->nullable();
            $table->string('telepon')->nullable();
            $table->string('fax')->nullable();
            $table->string('role')->default('customer');

            $table->string('pengirim_nama')->nullable();
            $table->string('pengirim_telepon')->nullable();
            $table->string('pengirim_nama_tempat')->nullable();
            $table->text('pengirim_alamat')->nullable();
            $table->string('pengirim_kota')->nullable();
            $table->string('pengirim_provinsi')->nullable();
            $table->string('pengirim_kode_pos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
