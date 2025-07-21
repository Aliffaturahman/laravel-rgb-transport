<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pemesanan_id',
        'nomor_resi',
        'status',
        'tanggal_pengiriman',
        'estimasi_tiba',
        'tanggal_terima'
    ];

    protected $dates = [
        'tanggal_pengiriman',
        'estimasi_tiba',
        'tanggal_terima'
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function riwayat()
    {
        return $this->hasMany(PengirimanRiwayat::class);
    }
}