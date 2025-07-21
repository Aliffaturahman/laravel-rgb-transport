<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenerima extends Model
{
    use HasFactory;
    protected $table = 'data_penerima';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'nama',
        'telepon',
        'nama_tempat',
        'alamat',
        'kota',
        'provinsi',
        'kode_pos',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
