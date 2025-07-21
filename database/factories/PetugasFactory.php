<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PetugasFactory extends Factory
{
    protected static $managerCount = 0;
    protected static $maxManager = 5;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $urutan = 1;
        
        // Tentukan jabatan
        $jabatan = (self::$managerCount < self::$maxManager) 
            ? 'Manager' 
            : 'Supir';

        // Update counter Manager
        if ($jabatan === 'Manager') {
            self::$managerCount++;
        }

        // Tentukan otoritas
        $otoritas = ($jabatan === 'Supir') 
            ? 'User' 
            : $this->faker->randomElement(['Admin', 'User']);

        return [
            'kode_petugas' => str_pad($urutan++, 5, '0', STR_PAD_LEFT),
            'nama_petugas' => $this->faker->name(),
            'jabatan' => $jabatan,
            'otoritas' => $otoritas,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Reset counter setelah selesai membuat data
     */
    public static function resetCounter(): void
    {
        self::$managerCount = 0;
    }
}
