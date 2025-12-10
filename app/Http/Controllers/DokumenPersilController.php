<?php
namespace App\Http\Controllers;

use App\Models\DokumenPersil;
use App\Models\Media;
use Illuminate\Http\Request;

class DokumenPersilController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
{
    $user = auth()->user(); // <= tambah ini

    $query = DokumenPersil::with('media');

    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('jenis_dokumen', 'like', "%{$request->search}%")
                ->orWhere('nomor', 'like', "%{$request->search}%")
                ->orWhere('keterangan', 'like', "%{$request->search}%");
        });
    }

    if ($request->filter) {
        $query->where('jenis_dokumen', $request->filter);
    }

    $dokumen = $query->paginate(8)->withQueryString();

    return view('pages.datapersil.datapertanahan', compact('dokumen', 'user')); 
}


    // Tampilkan form tambah
    public function create()
    {
        return view('pages.datapersil.create');
    }

    // Simpan data baru
    public function store(Request $request, DokumenPersil $dokumen_persil)
    {
        $validated = $request->validate([
            'persil_id'        => 'required|integer',
            'jenis_dokumen'    => 'required|string|max:255',
            'nomor'            => 'nullable|string|max:255',
            'keterangan'       => 'nullable|string',
            'dokumen_persil.*' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:4096',

        ]);

        $dokumen_persil = DokumenPersil::create($validated);

        if ($request->hasFile('dokumen_persil')) {

            foreach ($request->file('dokumen_persil') as $index => $file) {

                $fileName = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/dokumen_persil'), $fileName);

                Media::create([
                    'ref_table'  => 'dokumen_persil',
                    'ref_id'     => $dokumen_persil->dokumen_id,
                    'file_name'  => $fileName,
                    'caption'    => 'Dokumen Persil',
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

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
            'persil_id'        => 'required|integer',
            'jenis_dokumen'    => 'required|string|max:255',
            'nomor'            => 'nullable|string|max:255',
            'keterangan'       => 'nullable|string',
            'dokumen_persil.*' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:4096',

        ]);

        $dokumen_persil->update($validated);

        if ($request->hasFile('dokumen_persil')) {

            foreach ($request->file('dokumen_persil') as $index => $file) {

                $fileName = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/dokumen_persil'), $fileName);

                Media::create([
                    'ref_table'  => 'dokumen_persil',
                    'ref_id'     => $dokumen_persil->dokumen_id,
                    'file_name'  => $fileName,
                    'caption'    => 'Dokumen_persil',
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

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
