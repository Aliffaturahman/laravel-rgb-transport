<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nomor_pemesanan',
        'user_id',
        'kendaraan_id',

        'nama_pengirim',
        'telepon_pengirim',
        'nama_tempat_pengirim',
        'alamat_pengirim',
        'kota_pengirim',
        'provinsi_pengirim',
        'kode_pos_pengirim',

        'nama_penerima',
        'telepon_penerima',
        'nama_tempat_penerima',
        'alamat_penerima',
        'kota_penerima',
        'provinsi_penerima',
        'kode_pos_penerima',

        'biaya',
        'status'
    ];

    protected $casts = [
        'berat' => 'float'
    ];

    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class, 'id');
    }

    // public function barang()
    // {
    //     return $this->hasMany(BarangPemesanan::class);
    // }

    public function tracking()
    {
        return $this->hasMany(TrackingPengiriman::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public function barang()
    {
        return $this->hasMany(HargaAngkut::class);
    }
}