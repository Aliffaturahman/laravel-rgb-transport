<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HargaAngkut;


class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'kode_pelanggan',
        'nama_pelanggan',
        'kontak',
        'alamat1',
        'alamat2',
        'kota',
        'telepon',
        'fax',
        'email',
    ];
}
