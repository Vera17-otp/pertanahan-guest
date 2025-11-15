<?php

namespace Database\Seeders;

use App\Models\Warga;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreatePersilDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $faker = Faker::create('id_ID');

        // pastikan ada warga dulu
        $wargaIds = Warga::pluck('warga_id')->toArray();

        if (count($wargaIds) == 0) {
            $this->command->warn("⚠️ Tidak ada data warga. Jalankan WargaSeeder dulu.");
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            DB::table('persil')->insert([
                'kode_persil'       => 'PRS-' . strtoupper($faker->bothify('??###')),
                'pemilik_warga_id'  => $faker->randomElement($wargaIds),
                'luas_m2'           => $faker->numberBetween(50, 500),
                'penggunaan'        => $faker->randomElement(['Rumah Tinggal', 'Pemukiman', 'Kebun', 'Sawah', 'Lahan Kosong']),
                'alamat_lahan'      => $faker->streetAddress(),
                'rt'                => $faker->numberBetween(1, 5),
                'rw'                => $faker->numberBetween(1, 5),
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }
    }
}
