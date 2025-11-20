<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateWargaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            DB::table('wargas')->insert([
                'nama_lengkap'   => $faker->name(),
                'nik'            => $faker->unique()->numerify('################'),
                'no_kk'          => $faker->unique()->numerify('################'),
                'jenis_kelamin'  => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempat_lahir'   => $faker->city(),
                'alamat_lengkap' => $faker->address(),
            ]);
        }
    }
}
