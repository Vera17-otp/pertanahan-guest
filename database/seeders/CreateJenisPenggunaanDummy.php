<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisPenggunaan;

class CreateJenisPenggunaanDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar nama penggunaan dasar
        $namaList = [
            'Pemukiman',
            'Perkebunan',
            'Pertanian',
            'Industri',
            'Fasilitas Umum',
            'Perdagangan',
            'Perkantoran',
            'Sosial',
            'Rekreasi',
            'Lainnya'
        ];

        // Generate 100 data dummy
        for ($i = 1; $i <= 100; $i++) {

            JenisPenggunaan::create([
                'nama_penggunaan' => $namaList[array_rand($namaList)] . " " . $i,
                'keterangan'      => "Keterangan dummy jenis penggunaan ke-$i.",
            ]);
        }
    }
}
