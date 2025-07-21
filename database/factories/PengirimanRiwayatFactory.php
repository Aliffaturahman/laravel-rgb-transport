<?php

namespace Database\Factories;

use App\Models\PengirimanRiwayat;
use App\Models\Pengiriman;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PengirimanRiwayat>
 */
class PengirimanRiwayatFactory extends Factory
{
    protected $model = PengirimanRiwayat::class;

    public function definition(): array
    {
        return [
            'pengiriman_id' => Pengiriman::factory(), // Sesuaikan jika ada data existing
            'status' => $this->faker->randomElement(['Diproses', 'Dikirim', 'Di Gudang', 'Menuju Tujuan', 'Selesai', 'Gagal']),
            'keterangan' => $this->faker->sentence(),
            'lokasi' => $this->faker->city(),
            'tanggal' => $this->faker->dateTimeBetween('-7 days', 'now'),
        ];
    }
}