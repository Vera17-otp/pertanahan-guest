<?php

namespace App\Http\Controllers;

use App\Models\JenisPenggunaan;
use Illuminate\Http\Request;

class JenisPenggunaanController extends Controller
{
    // INDEX
    public function index(Request $request)
    {
        $query = JenisPenggunaan::query();

        // SEARCH
        if ($request->search) {
            $query->where('nama_penggunaan', 'like', "%{$request->search}%")
                  ->orWhere('keterangan', 'like', "%{$request->search}%");
        }

        // PAGINATION
        $jenis = $query->paginate(10)->withQueryString();

        return view('pages.jenispenggunaan.index', compact('jenis'));
    }

    // CREATE
    public function create()
    {
        return view('pages.jenispenggunaan.create');
    }

    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_penggunaan' => 'required|string|unique:jenis_penggunaan,nama_penggunaan',
            'keterangan'      => 'nullable|string',
        ]);

        JenisPenggunaan::create($validated);

        return redirect()->route('jenispenggunaan.index')
            ->with('success', 'Jenis Penggunaan berhasil ditambahkan!');
    }

    // EDIT
    public function edit($id)
    {
        $jenis = JenisPenggunaan::findOrFail($id);
        return view('pages.jenispenggunaan.edit', compact('jenis'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $jenis = JenisPenggunaan::findOrFail($id);

        $validated = $request->validate([
            'nama_penggunaan' => 'required|string|unique:jenis_penggunaan,nama_penggunaan,' . $id . ',jenis_id',
            'keterangan'      => 'nullable|string',
        ]);

        $jenis->update($validated);

        return redirect()->route('jenis_penggunaan.index')
            ->with('success', 'Jenis Penggunaan berhasil diperbarui!');
    }

    // DESTROY
    public function destroy($id)
    {
        $jenis = JenisPenggunaan::findOrFail($id);
        $jenis->delete();

        return redirect()->route('jenis_penggunaan.index')
            ->with('success', 'Jenis Penggunaan berhasil dihapus!');
    }
}
