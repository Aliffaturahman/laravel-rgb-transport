<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function create()
    {
        return view('admin.transaksi.suratMuat');
    }

    public function add(Request $request)
    {
        // Simpan data di sini atau validasi

        return redirect()->back()->with('success', 'Surat Tanda Terima berhasil disimpan.');
    }
}
