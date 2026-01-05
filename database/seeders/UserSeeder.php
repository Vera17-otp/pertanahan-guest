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
            'name'     => 'Admin',
            'role'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('Password123'),
        ]);

        User::create([
            'name'     => 'Client',
            'role'     => 'client',
            'email'    => 'client@gmail.com',
            'password' => Hash::make('Password123'),
        ]);

        User::create([
            'name'     => 'Staff',
            'role'     => 'staff',
            'email'    => 'sttaf@gmail.com',
            'password' => Hash::make('Password123'),
        ]);
         User::create([
            'name'     => 'fmi',
            'role'     => 'admin',
            'email'    => 'fmi@gmail.com',
            'password' => Hash::make('fmi'),
        ]);
        User::create([
            'name'     => 'hmn',
            'role'     => 'user',
            'email'    => 'hmn@gmail.com',
            'password' => Hash::make('hmn'),
        ]);

    }



}
