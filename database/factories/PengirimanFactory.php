<?php

namespace Database\Factories;

use App\Models\Pengiriman;
use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Pengiriman>
 */
class PengirimanFactory extends Factory
{
    protected $model = Pengiriman::class;

    public function definition(): array
    {
        $tanggalPengiriman = $this->faker->dateTimeBetween('-1 month', 'now');
        $estimasiTiba = (clone $tanggalPengiriman)->modify('+3 days');
        $tanggalTerima = $this->faker->boolean(70) ? (clone $estimasiTiba)->modify('+'.rand(0, 2).' days') : null;

        return [
            'pemesanan_id' => Pemesanan::factory(), // atau ID jika sudah ada data
            'nomor_resi' => 'RGB-' . strtoupper(Str::random(10)),
            'status' => $this->faker->randomElement(['Menunggu', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan']),
            'tanggal_pengiriman' => $tanggalPengiriman,
            'estimasi_tiba' => $estimasiTiba,
            'tanggal_terima' => $tanggalTerima,
        ];
    }
}
