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
        // Seeder untuk user dummy
        $this->call(CreateUserDummy::class);

        // Seeder warga
        $this->call(CreateWargaDummy::class);

        // Seeder persil
        $this->call(CreatePersilDummy::class);

        // Seeder dokumen persil (kalau ada)
        // $this->call(CreateDokumenPersilDummy::class);

        // Seeder peta persil
        $this->call(CreatePetaPersilDummy::class);
    }
}
