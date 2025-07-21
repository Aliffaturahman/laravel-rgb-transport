<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Kendaraan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemesanan>
 */
class PemesananFactory extends Factory
{
    public function definition(): array
    {
        $berat = $this->faker->randomFloat(2, 1, 100); // berat antara 1-100 kg
        $dimensi = $this->faker->numberBetween(10, 100) . 'x' .
                   $this->faker->numberBetween(10, 100) . 'x' .
                   $this->faker->numberBetween(10, 100) . ' cm';

        $tanggal = $this->faker->dateTimeBetween('-1 year', 'now');

        $status = $this->faker->randomElement([
            'Menunggu_Konfirmasi', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'
        ]);

        $kendaraanId = null;
        if ($status !== 'Menunggu_Konfirmasi') {
            $kendaraanId = Kendaraan::inRandomOrder()->value('id');
        }

        return [
            'nomor_pemesanan' => 'RGB-' . date('ymd') . '-' . strtoupper(substr(uniqid(), -5)),
            'user_id' => User::inRandomOrder()->value('id'),
            'kendaraan_id' => $kendaraanId,

            // Data Pengirim
            'nama_pengirim' => $this->faker->name,
            'telepon_pengirim' => $this->faker->phoneNumber,
            'nama_tempat_pengirim' => 'PT. ' . $this->faker->company,
            'alamat_pengirim' => $this->faker->streetAddress,
            'kota_pengirim' => $this->faker->city,
            'provinsi_pengirim' => $this->faker->state,
            'kode_pos_pengirim' => $this->faker->postcode,

            // Data Penerima
            'nama_penerima' => $this->faker->name,
            'telepon_penerima' => $this->faker->phoneNumber,
            'nama_tempat_penerima' => 'PT. ' . $this->faker->company,
            'alamat_penerima' => $this->faker->streetAddress,
            'kota_penerima' => $this->faker->city,
            'provinsi_penerima' => $this->faker->state,
            'kode_pos_penerima' => $this->faker->postcode,

            'biaya' => 0,
            'status' => $status,
            'created_at' => $tanggal,
            'updated_at' => $this->faker->dateTimeBetween($tanggal, 'now'),
        ];
    }
}
