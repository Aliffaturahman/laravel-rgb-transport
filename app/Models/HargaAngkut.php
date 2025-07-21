<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaAngkut extends Model
{
    use HasFactory;

    protected $table = 'harga_angkut';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = [
        'pemesanan_id',
        'kode_barang',
        'jenis_barang',
        'satuan',
        'berat',
        'dimensi',
        'catatan',
        'harga',
        'by_kawal',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
