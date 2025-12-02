<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PetaPersil;

class CreatePetaPersilDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buat 100 data dummy peta persil
        for ($i = 1; $i <= 100; $i++) {

            PetaPersil::create([
                'persil_id' => $i,  // pastikan persil 1–100 sudah ada

                'geojson'   => '{
                    "type": "Polygon",
                    "coordinates": [
                        [
                            [110.12, -7.45],
                            [110.12, -7.46],
                            [110.13, -7.46],
                            [110.12, -7.45]
                        ]
                    ]
                }',

                'panjang_m' => rand(10, 100),   // panjang acak
                'lebar_m'   => rand(10, 50),    // lebar acak
            ]);
        }
    }
}
