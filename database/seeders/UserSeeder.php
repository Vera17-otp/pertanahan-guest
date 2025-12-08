<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'name'     => 'Vera Zakia',
             'role'     => 'user',
            'email'    => 'verazakia68@mail.com',
            'password' => Hash::make('Password123'),
        ]);
    }



}
