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
        // Ambil semua data persil agar setiap persil memiliki minimal satu dokumen
        $semuaPersil = Persil::all();

        if ($semuaPersil->isEmpty()) {
            $this->command->warn("⚠️ Tabel persil masih kosong. Jalankan seeder CreatePersilDummy terlebih dahulu.");
            return;
        }

        // Daftar keterangan yang jelas dan masuk akal
        $daftarKeterangan = [
            "Dokumen lengkap",
            "Dokumen belum lengkap",
            "Sedang diproses",
            "Menunggu verifikasi",
            "Dalam pengecekan lapangan",
            "Dokumen masih direview",
            "Data sedang diperbarui"
        ];

        foreach ($semuaPersil as $persil) {
            DokumenPersil::create([
                'persil_id'     => $persil->persil_id,
                'jenis_dokumen' => 'AJB',
                'nomor'         => Str::upper(Str::random(12)),

                // Pilih keterangan secara acak dari daftar yang sudah disiapkan
                'keterangan'    => $daftarKeterangan[array_rand($daftarKeterangan)],

                // Kolom wajib
                

                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        $this->command->info("✅ Data dummy dokumen persil berhasil dibuat dengan keterangan yang jelas.");
    }
}
