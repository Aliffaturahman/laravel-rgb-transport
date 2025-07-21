<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenerimaanBarang;
use App\Models\Pelanggan;
use App\Models\HargaAngkut;

class PenerimaanBarangController extends Controller
{
    // Tampilkan form tambah data
    public function form()
    {
        $pelanggan = Pelanggan::all();
        $barang = HargaAngkut::all();
        return view('admin.transaksi.penerimaanBarang', compact('pelanggan', 'barang'));
    }

    // Tampilkan semua data
    public function tabel()
    {
        $penerimaan = PenerimaanBarang::with(['pengirim', 'penerima', 'barang'])->latest()->get();
        return view('admin.transaksi.penerimaanBarang', compact('penerimaan'));
    }

    // Simpan data baru
    public function add(Request $request)
    {
        $request->validate([
            'no_stt' => 'required|unique:penerimaan_barang,no_stt',
            'tanggal' => 'required|date',
            'pelanggan_pengirim' => 'required|exists:pelanggan,id',
            'pelanggan_penerima' => 'required|exists:pelanggan,id',
            'jenis_barang' => 'required|exists:harga_angkut,id',
            'banyak' => 'required|integer|min:1',
            'titipan' => 'required|integer|min:0',
            'keterangan' => 'nullable|string|max:100',
        ]);

        PenerimaanBarang::create($request->all());

        return redirect()->route('admin.penerimaan.index')->with('success', 'Data berhasil disimpan');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $penerimaan = PenerimaanBarang::findOrFail($id);
        $pelanggan = Pelanggan::all();
        $barang = HargaAngkut::all();
        return view('admin.penerimaan.edit', compact('penerimaan', 'pelanggan', 'barang'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $penerimaan = PenerimaanBarang::findOrFail($id);

        $request->validate([
            'no_stt' => 'required|unique:penerimaan_barang,no_stt,' . $id . ',id',
            'tanggal' => 'required|date',
            'pelanggan_pengirim' => 'required|exists:pelanggan,id',
            'pelanggan_penerima' => 'required|exists:pelanggan,id',
            'jenis_barang' => 'required|exists:harga_angkut,id',
            'banyak' => 'required|integer|min:1',
            'titipan' => 'required|integer|min:0',
            'keterangan' => 'nullable|string|max:100',
        ]);

        $penerimaan->update($request->all());

        return redirect()->route('admin.penerimaan.index')->with('success', 'Data berhasil diperbarui');
    }

    // Hapus data
    public function delete($id)
    {
        $penerimaan = PenerimaanBarang::findOrFail($id);
        $penerimaan->delete();

        return redirect()->route('admin.penerimaan.index')->with('success', 'Data berhasil dihapus');
    }
}
