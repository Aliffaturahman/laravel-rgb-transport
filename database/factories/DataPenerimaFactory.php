<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DataPenerima;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataPenerima>
 */
class DataPenerimaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1, // Selalu set user_id ke 1
            'nama' => $this->faker->name,
            'telepon' => $this->faker->phoneNumber,
            'nama_tempat' => $this->faker->company,
            'alamat' => $this->faker->streetAddress,
            'kota' => $this->faker->city,
            'provinsi' => $this->faker->state,
            'kode_pos' => $this->faker->postcode,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
