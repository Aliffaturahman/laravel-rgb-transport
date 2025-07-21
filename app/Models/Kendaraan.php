<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'plat_nomor',
        'jenis',
        'merk',
        'bbm',
        'supir',
        'exp_stnk',
        'exp_kir',
        'tgl_pembuatan',
    ];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'supir', 'id');
    }
}
