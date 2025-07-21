<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayat';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'waktu',
        'jenis',
        'keterangan',
        'status',
    ];
}
