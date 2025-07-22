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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('plat_nomor')->unique();
            $table->string('jenis', 100);
            $table->string('merk', 100);
            $table->string('bbm', 100);
            $table->unsignedbiginteger('supir')->nullable();
            $table->datetime('exp_stnk')->default(DB::raw('now()'));
            $table->datetime('exp_kir')->default(DB::raw('now()'));
            $table->datetime('tgl_pembuatan')->default(DB::raw('now()'));
            $table->timestamps();
                 
            $table->foreign('supir')
                ->references('id')->on('petugas')
                ->ondelete('restrict')
                ->onupdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
