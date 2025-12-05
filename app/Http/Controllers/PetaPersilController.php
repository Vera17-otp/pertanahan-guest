<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PetaPersil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PetaPersilController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $query = PetaPersil::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('geojson', 'like', "%{$request->search}%")
                    ->orWhere('panjang_m', 'like', "%{$request->search}%")
                    ->orWhere('lebar_m', 'like', "%{$request->search}%");
            });
        }

        if ($request->filter) {
            $query->where('persil_id', $request->filter);
        }

        $peta = $query->paginate(8)->withQueryString();

        return view('pages.petapersil.index', compact('peta'));
    }

    // Form tambah
    public function create()
    {
        return view('pages.petapersil.create');
    }

    // Simpan data baru + MEDIA
    public function store(Request $request)
    {
        $validated = $request->validate([
            'persil_id'     => 'required|integer',
            'geojson'       => 'required|string',
            'panjang_m'     => 'required|numeric',
            'lebar_m'       => 'required|numeric',

            // Media
            'peta_persil.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        // simpan peta
        $peta = PetaPersil::create($validated);

        // ---- SIMPAN MEDIA ----
        if ($request->hasFile('peta_persil')) {
            foreach ($request->file('peta_persil') as $index => $file) {

                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('uploads/peta_persil'), $fileName);

                Media::create([
                    'ref_table'  => 'peta_persil',
                    'ref_id'     => $peta->peta_id,
                    'file_name'  => $fileName,
                    'mime_type'  => $file->getClientMimeType(),
                    'caption'    => $file->getClientOriginalName(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()->route('peta_persil.index')->with('success', 'Peta Persil berhasil ditambahkan!');
    }

    // Edit data
    public function edit($id)
    {
        $peta = PetaPersil::findOrFail($id);

        return view('pages.petapersil.edit', compact('peta'));
    }

    // Update data + MEDIA
    public function update(Request $request, $id)
    {
        $peta = PetaPersil::findOrFail($id);

        $validated = $request->validate([
            'persil_id'     => 'required|integer',
            'geojson'       => 'required|string',
            'panjang_m'     => 'required|numeric',
            'lebar_m'       => 'required|numeric',
            'peta_persil.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $peta->update($validated);

        // ---- HAPUS MEDIA LAMA ----
        if ($request->delete_media) {
            foreach ($request->delete_media as $mediaId) {
                $media = Media::find($mediaId);

                if ($media) {
                    $path = public_path('uploads/peta_persil/' . $media->file_name);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                    $media->delete();
                }
            }
        }

        // ---- TAMBAH MEDIA BARU ----
        if ($request->hasFile('peta_persil')) {
            foreach ($request->file('peta_persil') as $index => $file) {

                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('uploads/peta_persil'), $fileName);

                Media::create([
                    'ref_table'  => 'peta_persil',
                    'ref_id'     => $peta->peta_id,
                    'file_name'  => $fileName,
                    'mime_type'  => $file->getClientMimeType(),
                    'caption'    => 'File Peta Persil',
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()->route('peta_persil.index')
            ->with('success', 'Peta Persil berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $peta = PetaPersil::findOrFail($id);
        $peta->delete();

        return redirect()->route('peta_persil.index')->with('success', 'Peta Persil berhasil dihapus!');
    }
}
