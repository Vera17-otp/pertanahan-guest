<?php

namespace App\Http\Controllers;

use App\Models\PetaPersil;
use Illuminate\Http\Request;

class PetaPersilController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $query = PetaPersil::query();

        // SEARCH
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('geojson', 'like', "%{$request->search}%")
                  ->orWhere('panjang_m', 'like', "%{$request->search}%")
                  ->orWhere('lebar_m', 'like', "%{$request->search}%");
            });
        }

        // FILTER (contoh: filter berdasarkan persil_id)
        if ($request->filter) {
            $query->where('persil_id', $request->filter);
        }

        // PAGINATION
        $peta = $query->paginate(8)->withQueryString();

        return view('pages.petapersil.index', compact('peta'));
    }

    // Tampilkan form tambah
    public function create()
    {
        return view('pages.petapersil.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'persil_id' => 'required|integer',
            'geojson'   => 'required|string',
            'panjang_m' => 'required|numeric',
            'lebar_m'   => 'required|numeric',
        ]);

        PetaPersil::create([
            'persil_id' => $validated['persil_id'],
            'geojson'   => $validated['geojson'],
            'panjang_m' => $validated['panjang_m'],
            'lebar_m'   => $validated['lebar_m'],
        ]);

        return redirect()->route('petapersil.index')->with('success', 'Peta Persil berhasil ditambahkan!');
    }

    // Edit data
    public function edit(PetaPersil $peta_persil)
    {
        return view('pages.petapersil.edit', compact('peta_persil'));
    }

    // Update data
    public function update(Request $request, PetaPersil $peta_persil)
    {
        $validated = $request->validate([
            'persil_id' => 'required|integer',
            'geojson'   => 'required|string',
            'panjang_m' => 'required|numeric',
            'lebar_m'   => 'required|numeric',
        ]);

        // Update langsung
        $peta_persil->update($validated);

        return redirect()->route('petapersil.index')->with('success', 'Peta Persil berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $peta = PetaPersil::findOrFail($id);
        $peta->delete();

        return redirect()->route('petapersil.index')->with('success', 'Peta Persil berhasil dihapus!');
    }
}
