<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Riwayat;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function form(Request $request)
    {
        // Ambil data petugas terakhir berdasarkan ID
        $lastPetugas = Petugas::orderBy('id', 'desc')->first();

        // Tentukan nomor terakhir (jika tidak ada, mulai dari 0)
        if ($lastPetugas && is_numeric($lastPetugas->kode_petugas)) {
            $lastNumber = (int) $lastPetugas->kode_petugas;
        } else {
            $lastNumber = 0;
        }

        // Generate kode baru dengan format 5 digit (misal: 00018)
        $newKode = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);

        // Kirim ke view
        return view('admin.data.addData.petugas', [
            'newKode' => $newKode
        ]);
    }

    public function table(Request $request)
    {
        $petugas = Petugas::orderBy('nama_petugas', 'asc')->get();
        return view('admin.data.petugas', compact('petugas'));
    }
    
    public function add(Request $request)
    {
        $request->validate([
            'kode_petugas' => 'required|string|max:100|unique:petugas,kode_petugas',
            'nama_petugas' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|same:password',
            'otoritas' => 'required|in:Admin,User',
        ],[
            'password_confirmation.same' => 'Confirm tidak cocok dengan Password',
        ]);

        // Validasi password admin saat ini
        if ($request->password !== session('username')) {
            return back()
                ->with('error', 'Password admin salah!')
                ->withInput();
        }

        $petugas = Petugas::create([
            'kode_petugas' => $request->kode_petugas,
            'nama_petugas' => $request->nama_petugas,
            'jabatan' => $request->jabatan,
            'otoritas' => $request->otoritas,
        ]);

        Riwayat::create([
            'jenis' => 'Petugas',
            'keterangan' => 'Data Petugas dengan kode ' . $petugas->kode_petugas . ' berhasil ditambah',
            'status' => 'Ditambah',
            'waktu' => now(),
        ]);

        if ($request->isMethod('get')) {
            return redirect()->route('admin.data.petugas');
        }

        return redirect()->route('admin.data.petugas')->with('success', 'Data petugas berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_petugas' => 'required|string|max:100|unique:petugas,kode_petugas,' . $id . ',id',
            'nama_petugas' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|same:password',
            'otoritas' => 'required|in:Admin,User',
        ], [
            'password_confirmation.same' => 'Confirm tidak cocok dengan Password',
        ]);

        // Validasi password admin saat ini
        if ($request->password !== session('username')) {
            return back()
                ->with('error', 'Password admin salah!')
                ->with('editModal', true)
                ->withInput();
        }

        $petugas = Petugas::findOrFail($id);
        $petugas->update([
            'kode_petugas' => $request->kode_petugas,
            'nama_petugas' => $request->nama_petugas,
            'jabatan' => $request->jabatan,
            'otoritas' => $request->otoritas,
        ]);

        Riwayat::create([
            'jenis' => 'Petugas',
            'keterangan' => 'Data Petugas dengan kode ' . $petugas->kode_petugas . ' berhasil diperbarui',
            'status' => 'Diperbarui',
            'waktu' => now(),
        ]);

        return redirect()->route('admin.data.petugas')->with('success', 'Data petugas berhasil diperbarui!');
    }

    public function delete($id)
    {
        $petugas = Petugas::findOrFail($id);

        if ($petugas->kendaraan()->count() > 0) {
            return redirect()->route('admin.data.petugas')
                ->with('error', 'Petugas tidak bisa dihapus karena masih digunakan pada data Kendaraan!');
        }
        $petugas->delete();

        Riwayat::create([
            'jenis' => 'Petugas',
            'keterangan' => 'Data Petugas dengan kode ' . $petugas->kode_petugas . ' telah dihapus',
            'status' => 'Dihapus',
            'waktu' => now(),
        ]);

        return redirect()->route('admin.data.petugas')->with('success', 'Data petugas berhasil dihapus!');
    }
}
