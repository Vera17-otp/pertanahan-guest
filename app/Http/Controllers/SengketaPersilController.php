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
            $query->where(function($q) use ($request) {
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
            'persil_id'    => 'required|integer',
            'pihak_1'      => 'required|string|max:255',
            'pihak_2'      => 'nullable|string|max:255',
            'kronologi'    => 'nullable|string',
            'status'       => 'nullable|string|max:50',
            'penyelesaian' => 'nullable|string',
        ]);

        SengketaPersil::create($validated);

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
            'persil_id'    => 'required|integer',
            'pihak_1'      => 'required|string|max:255',
            'pihak_2'      => 'nullable|string|max:255',
            'kronologi'    => 'nullable|string',
            'status'       => 'nullable|string|max:50',
            'penyelesaian' => 'nullable|string',
        ]);

        $sengketa->update($validated);

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
