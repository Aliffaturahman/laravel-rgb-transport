<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\HargaAngkut;
use App\Models\Riwayat;

class PelangganController extends Controller
{
    public function form()
    {
        $pelanggan = Pelanggan::all();
        $barang = HargaAngkut::all();

        // Ambil pelanggan terakhir
        $lastPelanggan = Pelanggan::orderBy('id', 'desc')->first();

        // Jika ada pelanggan, ambil kode terakhir; jika tidak, mulai dari 0
        if ($lastPelanggan && is_numeric($lastPelanggan->kode_pelanggan)) {
            $lastNumber = (int) $lastPelanggan->kode_pelanggan;
        } else {
            $lastNumber = 0;
        }

        // Generate kode pelanggan baru
        $newKode = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);

        return view('admin.data.addData.pelanggan', compact('pelanggan', 'barang', 'newKode'));
    }

    public function table()
    {
        $pelanggan = Pelanggan::all();
        $barang = HargaAngkut::all();
        return view('admin.data.pelanggan', compact('pelanggan', 'barang'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'kode_pelanggan' => 'required|string|max:100|unique:pelanggan,kode_pelanggan',
            'nama_pelanggan' => 'required|string|max:100',
            'kontak' => 'nullable|string|max:100',
            'alamat1' => 'required|string|max:255',
            'alamat2' => 'nullable|string|max:255',
            'kota' => 'required|string|max:100',
            'telepon' => 'required|string|max:50',
            'fax' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
        ]);

        $pelanggan = Pelanggan::create([
            'kode_pelanggan' => $request->kode_pelanggan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'kontak'         => $request->kontak,
            'alamat1'        => $request->alamat1,
            'alamat2'        => $request->alamat2,
            'kota'           => $request->kota,
            'telepon'        => $request->telepon,
            'fax'            => $request->fax,
            'email'          => $request->email,
        ]);

        Riwayat::create([
            'jenis' => 'Pelanggan',
            'keterangan' => 'Data Pelanggan dengan kode ' . $pelanggan->kode_pelanggan . ' berhasil ditambah',
            'status' => 'Ditambah',
            'waktu' => now(),
        ]);

        return redirect()->route('admin.data.pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan!');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_pelanggan' => 'required|string|max:100|unique:pelanggan,kode_pelanggan,' . $id . ',id',
            'nama_pelanggan' => 'required|string|max:100',
            'kontak' => 'nullable|string|max:100',
            'alamat1' => 'required|string|max:255',
            'alamat2' => 'nullable|string|max:255',
            'kota' => 'required|string|max:100',
            'telepon' => 'nullable|string|max:50',
            'fax' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'kode_pelanggan' => $request->kode_pelanggan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'kontak'         => $request->kontak,
            'alamat1'        => $request->alamat1,
            'alamat2'        => $request->alamat2,
            'kota'           => $request->kota,
            'telepon'        => $request->telepon,
            'fax'            => $request->fax,
            'email'          => $request->email,
        ]);
        
        Riwayat::create([
            'jenis' => 'Pelanggan',
            'keterangan' => 'Data Pelanggan dengan kode ' . $pelanggan->kode_pelanggan . ' berhasil diperbarui',
            'status' => 'Diperbarui',
            'waktu' => now(),
        ]);
        
        $barang = HargaAngkut::all();
        
        return redirect()->route('admin.data.pelanggan')->with('success', 'Data pelanggan berhasil diupdate!');
    }

    // public function edit($id)
    // {
    //     $pelanggan = Pelanggan::findOrFail($id);
    //     $barang = HargaAngkut::all();
    //     return view('admin.form.pelanggan', compact('pelanggan', 'barang'));
    // }

    public function delete($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        Riwayat::create([
            'jenis' => 'Pelanggan',
            'keterangan' => 'Data Pelanggan dengan kode ' . $pelanggan->kode_pelanggan . ' telah dihapus',
            'status' => 'Dihapus',
            'waktu' => now(),
        ]);

        return redirect()->route('admin.data.pelanggan')->with('success', 'Data pelanggan berhasil dihapus!');
    }
}
