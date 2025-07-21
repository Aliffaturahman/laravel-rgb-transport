<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Pemesanan;
use App\Models\Pengiriman;
use App\Models\Testimoni;
use App\Models\Pesan;
use App\Models\HargaAngkut;
use App\Models\DataPenerima;

use App\Models\BarangPemesanan;

class CustomerController extends Controller
{
    /**
     * Menampilkan halaman index (home)
     */
    public function index()
    {
        return view('customer.index');
    }

    /**
     * Menampilkan halaman layanan
     */
    public function layanan()
    {
        return view('customer.layanan');
    }

    /**
     * Menampilkan form pemesanan
     */
    public function pemesanan()
    {
        $user = auth()->user();
        $alamatLama = DataPenerima::where('user_id', $user->id)->get();
        
        return view('customer.pengiriman.pemesanan', compact('user', 'alamatLama'));
    }

    /**
     * Proses submit form pemesanan
     */
    public function submitPesanan(Request $request)
    {
        $validated = $request->validate([
            // Data pengirim
            'nama_pengirim' => 'required|string|max:100',
            'telepon_pengirim' => 'required|string|max:20',
            'nama_tempat_pengirim' => 'required|string|max:100',
            'alamat_pengirim' => 'required|string',
            'kota_pengirim' => 'required|string|max:100',
            'provinsi_pengirim' => 'required|string|max:100',
            'kode_pos_pengirim' => 'required|string|max:10',

            // Data penerima
            'nama_penerima' => 'required|string|max:100',
            'telepon_penerima' => 'required|string|max:20',
            'nama_tempat_penerima' => 'required|string|max:100',
            'alamat_penerima' => 'required|string',
            'kota_penerima' => 'required|string|max:100',
            'provinsi_penerima' => 'required|string|max:100',
            'kode_pos_penerima' => 'required|string|max:10',

            // Detail barang (array)
            'jenis_barang' => 'required|array|min:1',
            'jenis_barang.*' => 'required|string|max:50',
            'berat.*' => 'required|numeric|min:0.1',
            'dimensi.*' => 'nullable|string|max:50',
            'catatan.*' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            // Hitung total berat dan biaya
            $totalBerat = array_sum($validated['berat']);
            $hargaPerKg = 0;
            $totalBiaya = $totalBerat * $hargaPerKg;

            // Simpan pemesanan utama
            $pemesanan = Pemesanan::create([
                'user_id' => auth()->id(),
                'nomor_pemesanan' => 'RGB-' . date('ymd') . '-' . strtoupper(substr(uniqid(), -5)),
                
                // Pengirim
                'nama_pengirim' => $validated['nama_pengirim'],
                'telepon_pengirim' => $validated['telepon_pengirim'],
                'nama_tempat_pengirim' => $validated['nama_tempat_pengirim'],
                'alamat_pengirim' => $validated['alamat_pengirim'],
                'kota_pengirim' => $validated['kota_pengirim'],
                'provinsi_pengirim' => $validated['provinsi_pengirim'],
                'kode_pos_pengirim' => $validated['kode_pos_pengirim'],

                // Penerima
                'nama_penerima' => $validated['nama_penerima'],
                'telepon_penerima' => $validated['telepon_penerima'],
                'nama_tempat_penerima' => $validated['nama_tempat_penerima'],
                'alamat_penerima' => $validated['alamat_penerima'],
                'kota_penerima' => $validated['kota_penerima'],
                'provinsi_penerima' => $validated['provinsi_penerima'],
                'kode_pos_penerima' => $validated['kode_pos_penerima'],

                'biaya' => $totalBiaya,
                'status' => 'Menunggu_Konfirmasi'
            ]);

            // Simpan alamat penerima ke tabel alamat_penerima
            DataPenerima::firstOrCreate([
                'user_id' => auth()->id(),
                'nama' => $validated['nama_penerima'],
                'telepon' => $validated['telepon_penerima'],
                'nama_tempat' => $validated['nama_tempat_penerima'],
                'alamat' => $validated['alamat_penerima'],
                'kota' => $validated['kota_penerima'],
                'provinsi' => $validated['provinsi_penerima'],
                'kode_pos' => $validated['kode_pos_penerima'],
            ]);

            // Simpan tiap barang
            foreach ($validated['jenis_barang'] as $index => $jenis) {
                BarangPemesanan::create([
                    'pemesanan_id' => $pemesanan->id,
                    'jenis_barang' => $jenis,
                    'berat' => $validated['berat'][$index],
                    'dimensi' => $validated['dimensi'][$index] ?? null,
                    'catatan' => $validated['catatan'][$index] ?? null,
                ]);

                $last = HargaAngkut::orderBy('id', 'desc')->first();
                $kode = str_pad(($last ? $last->id + 1 : 1), 5, '0', STR_PAD_LEFT);

                HargaAngkut::create([
                    'pemesanan_id' => $pemesanan->id,
                    'kode_barang' => $kode,
                    'jenis_barang' => $jenis,
                    'satuan' => 'Kg', // jika belum ada input dari user, bisa pakai default
                    'berat' => $validated['berat'][$index],
                    'dimensi' => $validated['dimensi'][$index] ?? null,
                    'catatan' => $validated['catatan'][$index] ?? null,
                    'harga' => null, // atau isi default
                    'by_kawal' => null,
                ]);
            }

            DB::commit();
            return redirect()->route('customer.pemesanan_berhasil', ['id' => $pemesanan->id])
                            ->with('success', 'Pemesanan berhasil dikirim!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menyimpan pesanan: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan halaman konfirmasi pemesanan berhasil
     */
    public function pemesanan_berhasil($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        return view('customer.pengiriman.pemesanan_berhasil', [
            'pemesanan' => $pemesanan
        ]);
    }

    /**
     * Menampilkan halaman tentang kami
     */
    public function tentang()
    {
        return view('customer.tentang');
    }

    /**
     * Menampilkan halaman kontak
     */
    public function kontak()
    {
        return view('customer.informasi.kontak');
    }

    /**
     * Proses submit form kontak
     */
    public function submitKontak(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:1000'
        ]);

        // TODO: Simpan ke database atau kirim email
        Pesan::create($validated);

        return redirect()->route('customer.kontak')
            ->with('success', 'Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.');
    }

    /**
     * Menampilkan halaman testimoni
     */
    public function testimoni()
    {
        $testimoni = Testimoni::where('is_active', true)->latest()->get();
        $user = auth()->user();

        return view('customer.informasi.testimoni', compact('testimoni', 'user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('testimoni_photos', 'public');
            $validated['photo'] = 'storage/' . $photoPath;
        }

        $validated['is_active'] = false; // validasi admin

        Testimoni::create($validated);

        return back()->with('success', 'Testimoni berhasil dikirim dan sedang menunggu persetujuan.');
    }
}