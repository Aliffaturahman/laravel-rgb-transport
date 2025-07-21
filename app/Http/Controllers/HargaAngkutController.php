<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HargaAngkut;
use App\Models\Pelanggan;
use App\Models\Riwayat;
use App\Models\Pemesanan;

class HargaAngkutController extends Controller
{
    public function form()
    {
        // Ambil data HargaAngkut terakhir berdasarkan ID
        $lastHargaAngkut = HargaAngkut::orderBy('id', 'desc')->first();

        // Tentukan nomor terakhir (jika tidak ada, mulai dari 0)
        if ($lastHargaAngkut && is_numeric($lastHargaAngkut->kode_barang)) {
            $lastNumber = (int) $lastHargaAngkut->kode_barang;
        } else {
            $lastNumber = 0;
        }

        // Generate kode baru dengan format 5 digit (misal: 00018)
        $newKode = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);

        // Kirim ke view
        return view('admin.data.addData.hargaAngkut', [
            'newKode' => $newKode
        ]);
    }

    public function table()
    {
        $hargaAngkut = HargaAngkut::all();
        return view('admin.data.hargaAngkut', compact('hargaAngkut'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:100|unique:harga_angkut,kode_barang',
            'nomor_pemesanan' => 'required|string|exists:pemesanan,nomor_pemesanan',
            'jenis_barang' => 'required|string|max:100',
            'satuan' => 'nullable|string|max:100',
            'berat' => 'nullable|numeric',
            'dimensi' => 'nullable|string|max:255',
            'catatan' => 'nullable|string',
            'harga' => 'nullable|integer',
            'by_kawal' => 'nullable|integer',
        ]);

        try {
            // Cari pemesanan berdasarkan nomor
            $pemesanan = Pemesanan::where('nomor_pemesanan', $request->nomor_pemesanan)->firstOrFail();

            $hargaAngkut = HargaAngkut::create([
                'kode_barang' => $request->kode_barang,
                'pemesanan_id' => $pemesanan->id,
                'jenis_barang' => $request->jenis_barang,
                'satuan' => $request->satuan,
                'berat' => $request->berat,
                'dimensi' => $request->dimensi,
                'catatan' => $request->catatan,
                'harga' => $request->harga,
                'by_kawal' => $request->by_kawal,
            ]);

            Riwayat::create([
                'jenis' => 'Harga Angkut',
                'keterangan' => 'Barang tambahan untuk nomor pemesanan ' . $pemesanan->nomor_pemesanan . ' berhasil ditambahkan',
                'status' => 'Ditambah',
                'waktu' => now(),
            ]);

            return redirect()->route('admin.data.hargaAngkut')->with('success', 'Barang berhasil ditambahkan ke pemesanan!');
        
        } catch (ModelNotFoundException $e) {
            return back()->withErrors(['nomor_pemesanan' => 'Nomor pemesanan tidak ditemukan.']);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:100|unique:harga_angkut,kode_barang,' . $id . ',id',
            'jenis_barang' => 'required|string|max:100',
            'satuan' => 'nullable|string|max:100',
            'berat' => 'nullable|numeric',
            'dimensi' => 'nullable|string|max:255',
            'catatan' => 'nullable|string',
            'harga' => 'nullable|integer',
            'by_kawal' => 'nullable|integer',
            'pemesanan_id' => 'nullable|exists:pemesanan,id',
        ]);

        $hargaAngkut = HargaAngkut::findOrFail($id);
        $hargaAngkut->update([
            'kode_barang' => $request->kode_barang,
            'jenis_barang' => $request->jenis_barang,
            'satuan' => $request->satuan,
            'berat' => $request->berat,
            'dimensi' => $request->dimensi,
            'catatan' => $request->catatan,
            'harga' => $request->harga,
            'by_kawal' => $request->by_kawal,
            'pemesanan_id' => $request->pemesanan_id,
        ]);

        Riwayat::create([
            'jenis' => 'Harga Angkut',
            'keterangan' => 'Data Barang dengan kode ' . $hargaAngkut->kode_barang . ' berhasil diperbarui',
            'status' => 'Diperbarui',
            'waktu' => now(),
        ]);

        return redirect()->route('admin.data.hargaAngkut')->with('success', 'Data harga angkut berhasil diupdate!');
    }

    public function delete($id)
    {
        $hargaAngkut = HargaAngkut::findOrFail($id);
        $hargaAngkut->delete();

        Riwayat::create([
            'jenis' => 'Harga Angkut',
            'keterangan' => 'Data Barang dengan kode ' . $hargaAngkut->kode_barang . ' telah dihapus',
            'status' => 'Dihapus',
            'waktu' => now(),
        ]);

        return redirect()->route('admin.data.hargaAngkut')->with('success', 'Data harga angkut berhasil dihapus!');
    }
}
