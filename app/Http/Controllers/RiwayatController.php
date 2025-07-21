<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;

class RiwayatController extends Controller
{
    public function table(Request $request)
    {
        $jenis = $request->query('jenis');
        
        switch ($jenis) {
            case 'petugas':
                $keterangan = Petugas::find($referensi_id)->PLAT_PETUGAS;
                break;
            case 'pelanggan':
                $keterangan = Pelanggan::find($referensi_id)->nama_pelanggan;
                break;
            case 'harga_angkut':
                $keterangan = HargaAngkut::find($referensi_id)->jenis_barang;
                break;
            case 'kendaraan':
                $keterangan = Kendaraan::find($referensi_id)->plat_nomor;
                break;
        }

        $query = Riwayat::query();
        
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        $riwayat = $query->orderBy('waktu', 'desc')->get();

        return view('admin.data.riwayat', compact('riwayat'));
    }
}
