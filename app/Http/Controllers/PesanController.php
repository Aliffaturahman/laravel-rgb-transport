<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Pesan;

class PesanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesan::query();

        if ($request->has('subject') && $request->subject != '') {
            $query->where('subject', $request->subject);
        }

        $messages = $query->orderBy('created_at', 'desc')->get();

        return view('admin.pesan', compact('messages'));
    }

    public function destroy($id)
    {
        $message = Pesan::findOrFail($id);
        $message->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}
