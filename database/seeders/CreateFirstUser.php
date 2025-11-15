<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateFirstUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Vera zakia',
            'email' => 'vera@gmail.com',
            'password' => Hash::make('Admin123'),  // ← PASSWORD DI-HASH
        ]);
    }
}
