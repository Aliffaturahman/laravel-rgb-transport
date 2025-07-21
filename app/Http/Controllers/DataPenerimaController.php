<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenerima;
use Illuminate\Support\Facades\Auth;

class DataPenerimaController extends Controller
{
    /**
     * Ambil semua alamat penerima milik user yang sedang login
     */
    // public function getAlamatLama()
    // {
    //     $userId = Auth::id();

    //     $data = DataPenerima::where('user_id', $userId)->get();

    //     return response()->json($data); // untuk ajax
    // }

    /**
     * Simpan alamat penerima baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'nama_tempat' => 'nullable|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'kode_pos' => 'required|string|max:10',
        ]);

        DataPenerima::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'nama_tempat' => $request->nama_tempat,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
        ]);

        return redirect()->back()->with('success', 'Alamat penerima berhasil disimpan.');
    }

    public function edit($id)
    {
        $alamat = DataPenerima::where('id', $id)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();

        return view('customer.alamat.edit', compact('alamat'));
    }

    public function update(Request $request, $id)
    {
        $alamat = DataPenerima::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

        $request->validate([
            'nama' => 'required|string|max:100',
            'nama_tempat' => 'nullable|string|max:100',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'kota' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'kode_pos' => 'required|string|max:10',
        ]);

        $alamat->update([
            'nama' => $request->nama,
            'nama_tempat' => $request->nama_tempat,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
    ]);

        return redirect()->route('customer.dashboard')->with('success', 'Alamat berhasil diperbarui.');
    }


    /**
     * (Opsional) Hapus alamat penerima
     */
    public function destroy($id)
    {
        $alamat = DataPenerima::where('id', $id)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();

        $alamat->delete();

        return redirect()->route('customer.dashboard')->with('success', 'Alamat berhasil dihapus.');
    }
}