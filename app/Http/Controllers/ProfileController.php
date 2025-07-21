<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\Pelanggan;
use App\Models\DataPenerima;
use App\Models\Pemesanan;

class ProfileController extends Controller
{
    public function index()
    {
        return view('customer.dashboard', $this->loadDashboardData());
    }

    public function detail($id)
    {
        return view('customer.detail', $this->loadDashboardData($id));
    }

    private function loadDashboardData($pemesananDetailId = null)
    {
        $user = auth()->user();

        $penerima_limit = request('penerima_limit', 5);
        $dataPenerima = $user->dataPenerima()->limit($penerima_limit)->get();

        $limit = request('limit', 10);
        $status = request('status', 'semua');

        $query = Pemesanan::where('user_id', $user->id);
        if ($status !== 'semua') {
            $query->where('status', $status);
        }
        $riwayat_pemesanan = $query->orderByDesc('created_at')->limit($limit)->get();

        $pemesanan = null;
        if ($pemesananDetailId) {
            $pemesanan = Pemesanan::with('barang')->findOrFail($pemesananDetailId);
        }

        return compact('dataPenerima', 'riwayat_pemesanan', 'status', 'limit', 'penerima_limit', 'pemesanan');
    }


    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = $request->user();
        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        $user->save();

        // Cek apakah pelanggan sudah ada untuk user ini
        $pelanggan = Pelanggan::where('email', $user->email)->first();

        // Auto generate kode pelanggan jika pelanggan baru
        if (!$pelanggan) {
            $lastKode = Pelanggan::max('kode_pelanggan') ?? '00000';
            $newKode = str_pad(((int)$lastKode + 1), 5, '0', STR_PAD_LEFT);

            $pelanggan = new Pelanggan();
            $pelanggan->kode_pelanggan = $newKode;
        }

        // Sinkronisasi data ke pelanggan
        $pelanggan->nama_pelanggan = $user->name;
        $pelanggan->kontak = $user->kontak;
        $pelanggan->alamat1 = $user->alamat1;
        $pelanggan->alamat2 = $user->alamat2;
        $pelanggan->kota = $user->kota;
        $pelanggan->telepon = $user->telepon;
        $pelanggan->fax = $user->fax;
        $pelanggan->email = $user->email;
        $pelanggan->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function editPengirim(): View
    {
        return view('profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    public function updatePengirim(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'pengirim_nama' => 'required|string|max:255',
            'pengirim_telepon' => 'required|string|max:20',
            'pengirim_nama_tempat' => 'required|string|max:255',
            'pengirim_alamat' => 'required|string',
            'pengirim_kota' => 'required|string|max:100',
            'pengirim_provinsi' => 'required|string|max:100',
            'pengirim_kode_pos' => 'required|string|max:10',
        ]);

        $user = auth()->user();
        $user->update($validated);

        return Redirect::route('profile.pengirim.edit')->with('status', 'pengirim-updated');
    }
}
