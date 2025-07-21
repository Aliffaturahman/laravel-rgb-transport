<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Petugas;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kendaraan>
 */
class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plat_nomor' => strtoupper($this->faker->unique()->bothify('? #### ???')),
            'jenis' => $this->faker->randomElement(['Truk', 'Mobil Box', 'Pick Up']),
            'merk' => $this->faker->randomElement(['Toyota', 'Nissan', 'Mitsubishi', 'Hino']),
            'bbm' => $this->faker->randomElement(['Solar', 'Bensin', 'Listrik']),
            'supir' => function() {
                return Petugas::query()
                    ->inRandomOrder()
                    ->value('id');
            },        
            'exp_stnk' => $this->faker->dateTimeBetween('now', '+1 year'),
            'exp_kir' => $this->faker->dateTimeBetween('now', '+1 year'),  
            'tgl_pembuatan' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
