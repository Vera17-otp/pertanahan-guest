<?php
namespace App\Http\Controllers;

use App\Models\SengketaPersil;
use Illuminate\Http\Request;

class SengketaPersilController extends Controller
{
    public function index(Request $request)
    {
        $query = SengketaPersil::query();

        // Search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('pihak_1', 'like', "%{$request->search}%")
                    ->orWhere('pihak_2', 'like', "%{$request->search}%")
                    ->orWhere('status', 'like', "%{$request->search}%");
            });
        }

        $data = $query->paginate(10)->withQueryString();

        return view('pages.sengketapersil.index', compact('data'));
    }

    public function create()
    {
        return view('pages.sengketapersil.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'persil_id'       => 'required|integer',
            'pihak_1'         => 'required|string|max:255',
            'pihak_2'         => 'nullable|string|max:255',
            'kronologi'       => 'nullable|string',
            'status'          => 'nullable|string|max:50',
            'penyelesaian'    => 'nullable|string',
            'foto_sengketa.*' => 'nullable|image|max:4096',
        ]);

        // Create sengketa
        $sengketa = SengketaPersil::create($validated);

        // MULTIPLE FILES
        if ($request->hasFile('foto_sengketa')) {

            foreach ($request->file('foto_sengketa') as $index => $file) {

                $name = time() . "_" . $index . "_" . $file->getClientOriginalName();
                $mime = $file->getClientMimeType();

                $file->move(public_path('uploads/sengketa'), $name);

                \App\Models\Media::create([
                    'ref_table'  => 'sengketa_persil',
                    'ref_id'     => $sengketa->sengketa_id,
                    'file_name'  => $name,
                    'caption'    => 'Foto Sengketa',
                    'mime_type'  => $mime,
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()->route('sengketapersil.index')
            ->with('success', 'Data sengketa berhasil ditambahkan!');
    }

    public function edit(SengketaPersil $sengketa)
    {
        return view('pages.sengketapersil.edit', compact('sengketa'));
    }

    public function update(Request $request, SengketaPersil $sengketa)
    {
        $validated = $request->validate([
            'persil_id'       => 'required|integer',
            'pihak_1'         => 'required|string|max:255',
            'pihak_2'         => 'nullable|string|max:255',
            'kronologi'       => 'nullable|string',
            'status'          => 'nullable|string|max:50',
            'penyelesaian'    => 'nullable|string',
            'foto_sengketa.*' => 'nullable|image|max:4096',
        ]);

        $sengketa->update($validated);

        // MULTIPLE FILE UPLOAD
        if ($request->hasFile('foto_sengketa')) {

            foreach ($request->file('foto_sengketa') as $index => $file) {

                $name = time() . "_" . $index . "_" . $file->getClientOriginalName();
                $mime = $file->getClientMimeType();

                $file->move(public_path('uploads/sengketa'), $name);

                \App\Models\Media::create([
                    'ref_table'  => 'sengketa_persil',
                    'ref_id'     => $sengketa->sengketa_id,
                    'file_name'  => $name,
                    'caption'    => 'Foto Sengketa',
                    'mime_type'  => $mime,
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()->route('sengketapersil.index')
            ->with('success', 'Data sengketa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = SengketaPersil::findOrFail($id);
        $data->delete();

        return redirect()->route('sengketapersil.index')
            ->with('success', 'Data sengketa berhasil dihapus!');
    }
}
