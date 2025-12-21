<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Warga::query();

    // SEARCH
    if ($request->search) {
        $query->where(function($q) use ($request) {
            $q->where('nama_lengkap', 'like', '%'.$request->search.'%')
              ->orWhere('nik', 'like', '%'.$request->search.'%')
              ->orWhere('alamat_lengkap', 'like', '%'.$request->search.'%');
        });
    }

    // FILTER JENIS KELAMIN
    if ($request->filter) {
        $query->where('jenis_kelamin', $request->filter);
    }

    // PAGINATION
    $warga = $query->paginate(10)->withQueryString();

    return view('pages.warga.index', compact('warga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'nik' => 'required|string|max:20|unique:warga,nik',
            'no_kk' => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'nullable|string|max:100',
            'alamat_lengkap' => 'required|string',
        ]);
        Warga::create($validated);
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warga $warga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warga $warga)
    {
        return view('pages.warga.edit', compact('warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lengkap'   => 'required|string|max:100',
            'nik'            => 'required|string|max:20|unique:warga,nik,' . $id . ',warga_id',
            'no_kk'          => 'nullable|string|max:20',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir'   => 'nullable|string|max:100',
            'alamat_lengkap' => 'required|string',
        ]);

        $warga = Warga::findOrFail($id);
        $warga->update($validated);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus.');
    }
}
