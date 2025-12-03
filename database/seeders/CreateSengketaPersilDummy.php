<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SengketaPersil;

class CreateSengketaPersilDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buat 100 data dummy sengketa persil
        for ($i = 1; $i <= 100; $i++) {

            SengketaPersil::create([
                'persil_id'     => $i, // pastikan persil id 1–100 tersedia

                'pihak_1'       => "Warga A $i",
                'pihak_2'       => "Warga B $i",

                'kronologi'     => "Terjadi sengketa antara pihak_1 dan pihak_2 pada persil ke-$i karena permasalahan batas tanah.",

                // alternating status
                'status'        => $i % 2 == 0 ? 'proses' : 'selesai',

                // alternating penyelesaian
                'penyelesaian'  => $i % 2 == 0 ? 'Belum ada penyelesaian' : 'Selesai melalui musyawarah',

                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
