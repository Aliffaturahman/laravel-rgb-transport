<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BarangPemesanan;
use App\Models\Pemesanan;

class BarangPemesananFactory extends Factory
{
    protected $model = BarangPemesanan::class;

    public function definition(): array
    {
        return [
            'pemesanan_id' => function() {
                return Pemesanan::query()
                    ->inRandomOrder()
                    ->value('id');
            },  
            'jenis_barang' => $this->faker->word(),
            'berat' => $this->faker->randomFloat(2, 1, 100), // berat antara 1-100 kg
            'dimensi' => $this->faker->randomElement([
                '30x40x50 cm', '50x60x70 cm', '20x20x20 cm', null
            ]),
            'catatan' => $this->faker->optional()->sentence(),
        ];
    }
}
