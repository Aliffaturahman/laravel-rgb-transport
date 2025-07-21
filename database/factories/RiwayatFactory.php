<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Riwayat>
 */
class RiwayatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenis = $this->faker->randomElement(['Harga Angkut', 'Kendaraan', 'Petugas', 'Pelanggan']);
        $status = $this->faker->randomElement(['Ditambah', 'Diperbarui', 'Dihapus']);
        $kode = $this->faker->randomElement(['ABC123', 'XYZ456', 'DEF789', 'GHI012', 'JKL345']);

        $keterangan = $this->generateKeterangan($jenis, $status, $kode);

        return [
            'waktu' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'jenis' => $jenis,
            'keterangan' => $keterangan,
            'status' => $status,
        ];
    }

    /**
     * Generate contoh keterangan berdasarkan jenis
     */
    protected function generateKeterangan(string $jenis, string $status, string $kode): string
    {
        $template = match ($status) {
            'Ditambah' => "Data $jenis dengan kode $kode berhasil ditambahkan",
            'Diperbarui' => "Data $jenis dengan kode $kode berhasil diperbarui",
            'Dihapus' => "Data $jenis dengan kode $kode telah dihapus",
            default => "Data $jenis dengan kode $kode diproses"
        };

        return $template;
    }
}
