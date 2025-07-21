<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TrackingPengiriman;
use App\Models\Pemesanan;

class TrackingController extends Controller
{
    /**
     * Admin
     */
    public function index(Request $request)
    {
        $query = Pemesanan::query();
        $status = $request->query('status', 'menunggu_konfirmasi');

        if ($status !== 'semua') {
            $query->where('status', $status);
        }
        $pemesanan = $query->with('user')->orderBy('created_at', 'desc')->get();

        return view('admin.tracking.index', compact('pemesanan'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanan,id',
            'subject' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        TrackingPengiriman::create([
            'pemesanan_id' => $request->pemesanan_id,
            'subject' => $request->subject,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Riwayat tracking berhasil ditambahkan.');
    }
    
    public function destroy($id, Request $request)
    {
        $tracking = TrackingPengiriman::findOrFail($id);
        $tracking->delete();
        return back()->with('success', 'Tracking berhasil dihapus.');
    }

    /**
     * Customer
     */
    public function tracking(Request $request)
    {
        $riwayat_pemesanan = Pemesanan::where('user_id', auth()->id())
                ->orderByDesc('created_at')
                ->get();

        return view('customer.pengiriman.tracking', compact('riwayat_pemesanan'));
    }

    public function search(Request $request)
    {
        $nomor = $request->nomor_pemesanan;

        $pemesanan = Pemesanan::where('nomor_pemesanan', $nomor)
            ->where('user_id', auth()->id())
            ->first();

        if (!$pemesanan) {
            return redirect()->route('customer.pengiriman.tracking')->with('error', 'Nomor pemesanan tidak ditemukan.');
        }

        $tracking_pengiriman = TrackingPengiriman::where('pemesanan_id', $pemesanan->id)
            ->orderBy('created_at', 'asc')
            ->get();

        $riwayat_pemesanan = Pemesanan::where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->get();

        return view('customer.pengiriman.tracking', compact('pemesanan', 'tracking_pengiriman', 'riwayat_pemesanan'));
    }
}
