<?php

namespace App\Http\Controllers;

use App\Models\DokumenPersil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PertanahanGuestController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $dokumen = DokumenPersil::all();
        return view('pages.datapersil.datapertanahan', compact('dokumen'));
    }

    // Tampilkan form tambah
    public function create()
    {
        return view('pages.datapersil.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'persil_id'     => 'required|integer',
            'jenis_dokumen' => 'required|string|max:255',
            'nomor'         => 'nullable|string|max:255',
            'keterangan'    => 'nullable|string',
            'file_dokumen'  => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('file_dokumen')) {
            $originalName = $request->file('file_dokumen')->getClientOriginalName();
            $imageName = $request->file('file_dokumen')->storeAs('dokumen_persil', $originalName, 'public');
        }
        DokumenPersil::create([
            'persil_id'     => $validated['persil_id'],
            'jenis_dokumen' => $validated['jenis_dokumen'],
            'nomor'         => $validated['nomor'],
            'keterangan'    => $validated['keterangan'],
            'file_dokumen'  => $imageName,
        ]);

        return redirect()->route('pertanahanguest.index')->with('success', 'Dokumen Persil berhasil ditambahkan!');
    }

    // Edit data
    public function edit(DokumenPersil $dokumen_persil)

    {
        return view('pages.datapersil.edit', compact('dokumen_persil'));
    }

    // Update data
    public function update(Request $request, DokumenPersil $dokumen_persil)
    {
        $validated = $request->validate([
            'persil_id'     => 'required|integer',
            'jenis_dokumen' => 'required|string|max:255',
            'nomor'         => 'nullable|string|max:255',
            'keterangan'    => 'nullable|string',
            'file_dokumen'  => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('file_dokumen')) {
            if ($dokumen_persil->file_path) {
                Storage::disk('public')->delete($dokumen_persil->file_path);
            }
            $validated['file_path'] = $request->file('file_dokumen')->store('dokumen_persil', 'public');
        }

        $dokumen_persil->update($validated);

        return redirect()->route('pertanahanguest.index')->with('success', 'Dokumen Persil berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $dokumen = DokumenPersil::findOrFail($id);
        $dokumen->delete();
        return redirect()->route('pertanahanguest.index')->with('success', 'Dokumen Persil berhasil dihapus!');
    }
}
