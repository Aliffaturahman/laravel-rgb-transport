<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),

            // Data Profil
            'kontak' => $this->faker->firstName(),
            'alamat1' => $this->faker->streetAddress(),
            'alamat2' => $this->faker->secondaryAddress(),
            'kota' => $this->faker->city(),
            'telepon' => $this->faker->phoneNumber(),
            'fax' => $this->faker->phoneNumber(),

            // Data pengirim
            'pengirim_nama' => $this->faker->name(),
            'pengirim_telepon' => $this->faker->phoneNumber(),
            'pengirim_nama_tempat' => $this->faker->company(),
            'pengirim_alamat' => $this->faker->address(),
            'pengirim_kota' => $this->faker->city(),
            'pengirim_provinsi' => $this->faker->state(),
            'pengirim_kode_pos' => $this->faker->postcode(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
