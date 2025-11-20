<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DokumenPersil;
use App\Models\Persil;
use Illuminate\Support\Str;

class CreateDokumenPersilDummy extends Seeder
{
    public function run(): void
    {
        // Ambil semua persil agar setiap persil punya minimal 1 dokumen
        $persils = Persil::all();

        foreach ($persils as $persil) {
            DokumenPersil::create([
                'persil_id'     => $persil->id,
                'jenis_dokumen' => 'AJB',
                'nomor'         => Str::upper(Str::random(12)),
                'keterangan'    => fake()->sentence(),
                
                // ★ WAJIB: kolom ini TIDAK boleh null
                'file_dokumen'  => 'dummy.pdf',

                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
