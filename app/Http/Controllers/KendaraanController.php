<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Petugas;
use App\Models\Riwayat;

class KendaraanController extends Controller
{
    public function form()
    {
        $kendaraan = Kendaraan::all();
        $petugas = Petugas::all();
        return view('admin.data.addData.kendaraan', compact('kendaraan', 'petugas'));
    }

    public function table()
    {
        $kendaraan = Kendaraan::all();
        $petugas = Petugas::all();
        return view('admin.data.kendaraan', compact('kendaraan', 'petugas'));
    }
    
    public function add(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required|string|max:20|unique:kendaraan,plat_nomor',
            'jenis' => 'required|string|max:50',
            'merk' => 'required|string|max:100',
            'bbm' => 'required|string|max:50',
            'supir' => 'required|exists:petugas,id',
            'exp_stnk' => 'required|date',
            'exp_kir' => 'required|date',
            'tgl_pembuatan' => 'required|date',
        ]);

        $kendaraan = Kendaraan::create([
            'plat_nomor' => $request->plat_nomor,
            'jenis' => $request->jenis,
            'merk' => $request->merk,
            'bbm' => $request->bbm,
            'supir' => $request->supir,
            'exp_stnk' => $request->exp_stnk,
            'exp_kir' => $request->exp_kir,
            'tgl_pembuatan' => $request->tgl_pembuatan,
        ]);

        Riwayat::create([
            'jenis' => 'Kendaraan',
            'keterangan' => 'Data Kendaraan dengan plat ' . $kendaraan->plat_nomor . ' berhasil ditambah',
            'status' => 'Ditambah',
            'waktu' => now(),
        ]);

        return redirect()->route('admin.data.kendaraan')->with('success', 'Data kendaraan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plat_nomor' => 'required|string|max:20|unique:kendaraan,plat_nomor,' . $id . ',id',
            'jenis' => 'required|string|max:50',
            'merk' => 'required|string|max:100',
            'bbm' => 'required|string|max:50',
            'supir' => 'required|exists:petugas,id',
            'exp_stnk' => 'required|date',
            'exp_kir' => 'required|date',
            'tgl_pembuatan' => 'required|date',
        ]);

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update([
            'plat_nomor' => $request->plat_nomor,
            'jenis' => $request->jenis,
            'merk' => $request->merk,
            'bbm' => $request->bbm,
            'supir' => $request->supir,
            'exp_stnk' => $request->exp_stnk,
            'exp_kir' => $request->exp_kir,
            'tgl_pembuatan' => $request->tgl_pembuatan,
        ]);

        Riwayat::create([
            'jenis' => 'Kendaraan',
            'keterangan' => 'Data Kendaraan dengan plat ' . $kendaraan->plat_nomor . ' berhasil diperbarui',
            'status' => 'Diperbarui',
            'waktu' => now(),
        ]);

        return redirect()->route('admin.data.kendaraan')->with('success', 'Data kendaraan berhasil diupdate!');
    }

    public function delete($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        Riwayat::create([
            'jenis' => 'Kendaraan',
            'keterangan' => 'Data Kendaraan dengan plat ' . $kendaraan->plat_nomor . ' telah dihapus',
            'status' => 'Dihapus',
            'waktu' => now(),
        ]);

        return redirect()->route('admin.data.kendaraan')->with('success', 'Data kendaraan berhasil dihapus!');
    }
}
