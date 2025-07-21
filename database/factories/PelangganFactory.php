<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pelanggan;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pelanggan::class;

    public function definition(): array
    {
        static $urutan = 1;

        // Ambil user yang sudah ada atau buat baru
        $user = User::inRandomOrder()->first();

        return [
            'kode_pelanggan' => str_pad($urutan++, 5, '0', STR_PAD_LEFT),
            'nama_pelanggan' => $user?->name ?? $this->faker->name(),
            'kontak' => $user?->kontak ?? $this->faker->firstName(),
            'alamat1' => $user?->alamat1 ?? $this->faker->address(),
            'alamat2' => $user?->alamat2 ?? $this->faker->optional()->address(),
            'kota' => $user?->kota ?? $this->faker->city(),
            'telepon' => $user?->telepon ?? $this->faker->phoneNumber(),
            'fax' => $user?->fax ?? $this->faker->optional()->phoneNumber(),
            'email' => $user?->email ?? $this->faker->unique()->safeEmail(),
        ];
    }   
}