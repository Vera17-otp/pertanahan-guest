<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Persil;
use App\Models\Warga;
use Illuminate\Http\Request;

class PersilController extends Controller
{
    // Tampilkan semua data persil + pagination + search + filter
    public function index(Request $request)
    {
        $query = Persil::query()->with('warga'); // Tambahkan eager loading

        // Search
        if ($request->search) {
            $query->where('kode_persil', 'LIKE', "%{$request->search}%")
                ->orWhere('alamat_lahan', 'LIKE', "%{$request->search}%")
                ->orWhere('penggunaan', 'LIKE', "%{$request->search}%");
        }

        // Filter berdasarkan pemilik
        if ($request->pemilik_warga_id) {
            $query->where('pemilik_warga_id', $request->pemilik_warga_id);
        }

        // Pagination
        $persil = $query->paginate(10)->withQueryString();

        return view('pages.persil.index', compact('persil'));
    }

    // Tampilkan form tambah persil
    public function create()
    {
        $warga = Warga::all();
        return view('pages.persil.create', compact('warga'));
    }

    // Simpan data persil baru
    public function store(Request $request, Persil $persil)
    {
        $validated = $request->validate([
            'kode_persil'      => 'required|string|max:255|unique:persil,kode_persil',
            'pemilik_warga_id' => 'nullable|integer',
            'luas_m2'          => 'nullable|numeric',
            'penggunaan'       => 'nullable|string|max:255',
            'alamat_lahan'     => 'nullable|string|max:255',
            'rt'               => 'nullable|string|max:10',
            'rw'               => 'nullable|string|max:10',
            'persil.*'         => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $persil = Persil::create($validated);

        if ($request->hasFile('persil')) {

            foreach ($request->file('persil') as $index => $file) {

                $fileName = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/persil'), $fileName);

                Media::create([
                    'ref_table'  => 'persil',
                    'ref_id'     => $persil->persil_id,
                    'file_name'  => $fileName,
                    'caption'    => 'Foto Bidang Persil',
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

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
            'kode_persil'      => 'required|string|max:255|unique:persil,kode_persil,' . $persil->persil_id . ',persil_id',
            'pemilik_warga_id' => 'nullable|integer',
            'luas_m2'          => 'nullable|numeric',
            'penggunaan'       => 'nullable|string|max:255',
            'alamat_lahan'     => 'nullable|string|max:255',
            'rt'               => 'nullable|string|max:10',
            'rw'               => 'nullable|string|max:10',
            'persil.*'         => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $persil->update($validated);

        if ($request->hasFile('persil')) {

            foreach ($request->file('persil') as $index => $file) {

                $fileName = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/persil'), $fileName);

                Media::create([
                    'ref_table'  => 'persil',
                    'ref_id'     => $persil->persil_id,
                    'file_name'  => $fileName,
                    'caption'    => 'Foto Bidang Persil (Update)',
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

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
