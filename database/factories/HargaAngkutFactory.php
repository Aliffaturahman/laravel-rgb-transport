<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pemesanan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HargaAngkutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $urutan = 1;

        $jenisBarangOptions = [
            'Bangunan',
            'Tekstil',
            'Dokumen',
            'Makanan',
            'Elektronik',
            'Lainnya',
        ];
        
        return [
            'pemesanan_id' => Pemesanan::factory(),
            'kode_barang' => str_pad($urutan++, 5, '0', STR_PAD_LEFT),
            'jenis_barang' => $this->faker->randomElement($jenisBarangOptions),
            'satuan' => $this->faker->randomElement(['Kg', 'Bal', 'Roll']),
            'berat' => $this->faker->randomFloat(2, 0.5, 100), // berat 0.5–100 kg
            'dimensi' => $this->faker->numberBetween(20, 100) . 'x' . $this->faker->numberBetween(20, 100) . 'x' . $this->faker->numberBetween(20, 100),
            'catatan' => $this->faker->sentence(),
            'harga' => $this->faker->numberBetween(10000, 1000000),
            'by_kawal' => $this->faker->numberBetween(5000, 50000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
