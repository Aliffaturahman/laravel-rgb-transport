<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\DataPenerima;

// ============= ADMIN =============
// Setup Data
use App\Models\Petugas;
use App\Models\Kendaraan;
use App\Models\HargaAngkut;
use App\Models\Pelanggan;
use App\Models\Riwayat;

// Transaksi
use App\Models\PenerimaanBarang;

// Lainnya
use App\Models\Pesan;
use App\Models\Testimoni;

// ============= CUSTOMER =============
use App\Models\Pemesanan;
use App\Models\BarangPemesanan;

use App\Models\Pengiriman;
use App\Models\PengirimanRiwayat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        User::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Alif Faturahman',
                'email' => 'alif@gmail.com',
                'password' => '12345678',

                // Field tambahan
                'kontak' => 'Alif',
                'alamat1' => 'Jl. Raya Kebayoran No. 123',
                'alamat2' => 'Komplek Permata Indah Blok B',
                'kota' => 'Jakarta',
                'telepon' => '081234567890',
                'fax' => '0217654321',

                // Data Pengirim
                'pengirim_nama' => 'Alif Faturahman',
                'pengirim_telepon' => '081234567890',
                'pengirim_nama_tempat' => 'Toko Alif',
                'pengirim_alamat' => 'Jl. Raya Kebayoran No. 123, Jakarta',
                'pengirim_kota' => 'Jakarta',
                'pengirim_provinsi' => 'DKI Jakarta',
                'pengirim_kode_pos' => '12345',
            ]
        );
        DataPenerima::factory()->count(5)->create();

        // ============= ADMIN =============
        // Setup Data
        Petugas::factory(18)->create();
        Kendaraan::factory(25)->create();
        Riwayat::factory(20)->create();

        // Orderan
        Pemesanan::factory()
            ->count(10)
            ->create()
            ->each(function ($pemesanan) {
                HargaAngkut::factory()
                    ->count(rand(1, 5))
                    ->create([
                        'pemesanan_id' => $pemesanan->id,
                    ]);
            });
        // Pelanggan::factory(7)->create();
        // Pemesanan::factory(17)->create();
        // Pemesanan::factory()->count(17)->create();
        // HargaAngkut::factory(38)->create();
        BarangPemesanan::factory()->count(25)->create();
        
        // Lainnya
        Pesan::factory()->count(15)->create();
        Testimoni::factory()->count(7)->create();

        // ============= CUSTOMER =============
    }
}
