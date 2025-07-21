<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangPemesanan extends Model
{
    use HasFactory;
    protected $table = 'barang_pemesanan';
    protected $fillable = [
        'pemesanan_id', 
        'jenis_barang', 
        'berat', 
        'dimensi', 
        'catatan'
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
