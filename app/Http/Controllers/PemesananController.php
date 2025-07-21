<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

use App\Models\Pemesanan;
use App\Models\Kendaraan;

class PemesananController extends Controller
{
    public function index(Request $request)
    {
        $query = Pemesanan::query();
        $status = $request->query('status', 'menunggu_konfirmasi');

        if ($status !== 'semua') {
            $query->where('status', $status);
        }
        $pemesanan = $query->with('user')->orderBy('created_at', 'desc')->get();
        
        $kendaraan = Kendaraan::with('petugas')->get();

        return view('admin.pemesanan.index', compact('pemesanan', 'kendaraan'));
    }

    public function detail($id)
    {
        $pemesanan = Pemesanan::with('barang')->findOrFail($id);
        return view('admin.pemesanan.detail', compact('pemesanan'));
    }

    public function invoice($id)
    {
        $pemesanan = Pemesanan::with('barang')->findOrFail($id);
        $pdf = PDF::loadView('admin.pemesanan.invoice', compact('pemesanan'));
        
        return $pdf->stream('invoice-'.$pemesanan->nomor_pemesanan.'.pdf');
        
        // Atau untuk langsung download:
        // return $pdf->download('invoice-'.$pemesanan->nomor_pemesanan.'.pdf');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'biaya' => 'required|numeric|min:0',
            'status' => 'required|in:Menunggu_Konfirmasi,Diproses,Dikirim,Selesai,Dibatalkan',
            'kendaraan_id' => 'nullable|exists:kendaraan,id',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->biaya = $validated['biaya'];
        $pemesanan->status = $validated['status'];
        $pemesanan->kendaraan_id = $validated['kendaraan_id'];
        $pemesanan->save();

        return redirect()->route('admin.pemesanan.index')->with('success', 'Data pemesanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}
