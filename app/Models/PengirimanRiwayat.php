<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanRiwayat extends Model
{
    use HasFactory;

    protected $table = 'pengiriman_riwayat';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pengiriman_id',
        'status',
        'keterangan',
        'lokasi',
        'tanggal'
    ];

    protected $dates = ['tanggal'];

    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class);
    }
}