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

        if ($persils->isEmpty()) {
            $this->command->warn("⚠️ Tabel persil kosong. Jalankan CreatePersilDummy terlebih dahulu.");
            return;
        }

        foreach ($persils as $persil) {
            DokumenPersil::create([
                'persil_id'     => $persil->persil_id, // Ganti id → persil_id
                'jenis_dokumen' => 'AJB',
                'nomor'         => Str::upper(Str::random(12)),
                'keterangan'    => fake()->sentence(),
                
                // ★ WAJIB: kolom ini TIDAK boleh null
                'file_dokumen'  => 'dummy.pdf',

                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        $this->command->info("✅ Dokumen persil dummy berhasil dibuat.");
    }
}
