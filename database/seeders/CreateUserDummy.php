<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUserDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        
        // Tambahkan 100 data user dummy
        for ($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([
                'name'     => $faker->name(),
                'email'    => $faker->unique()->safeEmail(),
                'password' => bcrypt('password'), // password default
            ]);
        }
    }
}
