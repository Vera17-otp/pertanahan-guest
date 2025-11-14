<?php

namespace App\Http\Controllers;

use App\Models\Persil;
use App\Models\Warga; 
use Illuminate\Http\Request;

class PersilController extends Controller
{
    // Tampilkan semua data persil
    public function index()
    {
        $persil = Persil::all();
        return view('pages.persil.index', compact('persil'));
    }

    // Tampilkan form tambah persil
    public function create()
    {
        $warga = Warga::all();   // <-- WAJIB, biar dropdown punya data

    return view('pages.persil.create', compact('warga'));
    }

    // Simpan data persil baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_persil'       => 'required|string|max:255|unique:persil,kode_persil',
            'pemilik_warga_id'  => 'nullable|integer',
            'luas_m2'           => 'nullable|numeric',
            'penggunaan'        => 'nullable|string|max:255',
            'alamat_lahan'      => 'nullable|string|max:255',
            'rt'                => 'nullable|string|max:10',
            'rw'                => 'nullable|string|max:10',
        ]);

        Persil::create($validated);

        return redirect()->route('persil.index')
                         ->with('success', 'Data persil berhasil ditambahkan!');
    }

    // Form edit persil
    public function edit(Persil $persil)
    {
        return view('pages.persil.edit', compact('persil'));
    }

    // Update persil
    public function update(Request $request, Persil $persil)
    {
        $validated = $request->validate([
            'kode_persil'       => 'required|string|max:255|unique:persil,kode_persil,' . $persil->persil_id . ',persil_id',
            'pemilik_warga_id'  => 'nullable|integer',
            'luas_m2'           => 'nullable|numeric',
            'penggunaan'        => 'nullable|string|max:255',
            'alamat_lahan'      => 'nullable|string|max:255',
            'rt'                => 'nullable|string|max:10',
            'rw'                => 'nullable|string|max:10',
        ]);

        $persil->update($validated);

        return redirect()->route('persil.index')
                         ->with('success', 'Data persil berhasil diperbarui!');
    }

    // Hapus persil
    public function destroy($id)
    {
        $persil = Persil::findOrFail($id);

        // Jika ingin sekalian hapus dokumen persil yang terkait:
        // $persil->dokumen()->delete();

        $persil->delete();

        return redirect()->route('persil.index')
                         ->with('success', 'Data persil berhasil dihapus!');
    }
}
