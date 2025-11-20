<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder untuk user pertama (akun admin)
        //$this->call(UserSeeder::class);

        // Seeder untuk data dummy lainnya
        //$this->call([
            //CreateWargaDummy::class,
            //CreatePersilDummy::class,
            //CreateDokumenPersilDummy::class,
        $this->call(CreateUserDummy::class);
        $this->call(CreateWargaDummy::class);


    }
}
