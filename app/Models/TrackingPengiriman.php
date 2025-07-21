<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingPengiriman extends Model
{
    use HasFactory;

    protected $table = 'tracking_pengiriman';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pemesanan_id',
        'subject',
        'keterangan',
        'waktu',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}