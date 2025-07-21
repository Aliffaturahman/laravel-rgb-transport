<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = [
        'kode_petugas',
        'nama_petugas',
        'jabatan',
        'otoritas',
    ];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'supir', 'id');
    }
}
