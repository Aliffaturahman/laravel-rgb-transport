<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function index(Request $request)
    {
        $query = Testimoni::query();

        if ($request->has('is_active') && $request->is_active != '') {
            $query->where('is_active', $request->is_active);
        }

        $testimonials = $query->orderBy('created_at', 'desc')->get();

        return view('admin.testimoni', compact('testimonials'));
    }

    public function toggleStatus($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->is_active = !$testimoni->is_active;
        $testimoni->save();

        return back()->with('success', 'Status testimoni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        // Hapus file foto dari storage jika ada dan bukan foto default
        if ($testimoni->photo && Storage::exists(str_replace('storage/', 'public/', $testimoni->photo))) {
            Storage::delete(str_replace('storage/', 'public/', $testimoni->photo));
        }

        $testimoni->delete();

        return back()->with('success', 'Testimoni berhasil dihapus.');
    }
}
