<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\Models\Pelanggan;
use App\Models\HargaAngkut;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PenerimaanBarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // format nomor stt: stt-yyyymmdd-xxx
        $nostt = 'STT-' . now()->format('ymd') . '-' . $this->faker->unique()->numberBetween(100, 999);

        return [
            'no_stt' => $nostt,
            'tanggal' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'pelanggan_pengirim' => function() {
                return Pelanggan::inRandomOrder()->first()->id ?? 
                       Pelanggan::factory()->create()->id;
            },
            'pelanggan_penerima' => function() {
                return Pelanggan::inRandomOrder()->first()->id ?? 
                       Pelanggan::factory()->create()->id;
            },
            'jenis_barang' => function() {
                return Hargaangkut::inRandomOrder()->first()->id ?? 
                       Hargaangkut::factory()->create()->id;
            },
            'banyak' => $this->faker->numberBetween(1, 100),
            'titipan' => $this->faker->numberBetween(0, 50),
            'keterangan' => Arr::random([
                'barang pecah belah',
                'barang elektronik',
                'barang umum',
                'barang berharga',
                'barang khusus',
                'barang curah',
                'barang bekas'
            ]),
        ];
    }
}
