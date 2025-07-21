<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;
use App\Models\Barang;

class PenerimaanBarang extends Model
{
    use HasFactory;

    protected $table = 'penerimaan_barang';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'no_stt',
        'tanggal',
        'pelanggan_pengirim',
        'pelanggan_penerima',
        'jenis_barang',
        'banyak',
        'titipan',
        'keterangan'
    ];

    public function pelangganPengirim()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_pengirim', 'id');
    }

    public function pelangganPenerima()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_penerima', 'id');
    }

    public function jenisBarang()
    {
        return $this->belongsTo(HargaAngkut::class, 'jenis_barang', 'id');
    }
}
