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
        // Gunakan Faker dengan locale Indonesia
        $faker = Faker::create('id_ID');

        // Nama-nama Indonesia untuk variasi
        $maleNames = [
            'Ahmad', 'Budi', 'Cahyo', 'Dedi', 'Eko', 'Fajar', 'Gunawan', 'Hadi', 'Irfan', 'Joko',
            'Kurniawan', 'Lukman', 'Muhammad', 'Nugroho', 'Oki', 'Prasetyo', 'Qomar', 'Rizky', 'Setya', 'Taufik',
            'Umar', 'Vino', 'Wahyu', 'Yoga', 'Zulkifli'
        ];

        $femaleNames = [
            'Ayu', 'Bunga', 'Citra', 'Dewi', 'Eka', 'Fitri', 'Gita', 'Hani', 'Indah', 'Julia',
            'Kartika', 'Lestari', 'Maya', 'Nur', 'Oktavia', 'Putri', 'Qonita', 'Rani', 'Sari', 'Tina',
            'Umi', 'Vina', 'Widi', 'Yuni', 'Zahra'
        ];

        // Domain email Indonesia
        $domains = ['gmail.com', 'yahoo.com', 'outlook.com', 'hotmail.com', 'ymail.com'];

        // Tambahkan 100 data user dummy Indonesia
        for ($i = 0; $i < 100; $i++) {
            $gender = $faker->randomElement(['male', 'female']);
            $firstName = $gender === 'male'
                ? $faker->randomElement($maleNames)
                : $faker->randomElement($femaleNames);

            $lastName = $faker->lastName();
            $fullName = $firstName . ' ' . $lastName;

            // Email dengan nama Indonesia
            $emailParts = explode(' ', strtolower($fullName));
            $emailUsername = implode('.', $emailParts);
            $domain = $faker->randomElement($domains);
            $email = $emailUsername . '@' . $domain;

            // Handle kemungkinan duplikat email
            $counter = 1;
            while (DB::table('users')->where('email', $email)->exists()) {
                $email = $emailUsername . $counter . '@' . $domain;
                $counter++;
            }

            DB::table('users')->insert([
                'name'     => $fullName,
                'email'    => $email,
                'password' => bcrypt('password'), // password default
                'role'     => $faker->randomElement(['user', 'admin']), // tambahkan role
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }

        // Tambahkan beberapa user dengan role admin secara spesifik
        $adminUsers = [
            [
                'name' => 'Admin Utama',
                'email' => 'admin@system.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@system.com',
                'password' => bcrypt('superadmin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Administrator',
                'email' => 'administrator@system.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            
        ];

        foreach ($adminUsers as $adminUser) {
            // Cek jika email sudah ada
            if (!DB::table('users')->where('email', $adminUser['email'])->exists()) {
                DB::table('users')->insert($adminUser);
            }
        }

        // Tambahkan beberapa user dummy dengan nama Indonesia populer
        $popularUsers = [
            ['Budi Santoso', 'budi.santoso@gmail.com', 'user'],
            ['Siti Nurhaliza', 'siti.nurhaliza@yahoo.com', 'user'],
            ['Agus Supriyanto', 'agus.supriyanto@gmail.com', 'user'],
            ['Dewi Lestari', 'dewi.lestari@outlook.com', 'user'],
            ['Rudi Hartono', 'rudi.hartono@gmail.com', 'user'],
            ['Maya Sari', 'maya.sari@hotmail.com', 'user'],
            ['Hadi Pranoto', 'hadi.pranoto@gmail.com', 'user'],
            ['Lina Marlina', 'lina.marlina@ymail.com', 'user'],
        ];

        foreach ($popularUsers as $user) {
            if (!DB::table('users')->where('email', $user[1])->exists()) {
                DB::table('users')->insert([
                    'name' => $user[0],
                    'email' => $user[1],
                    'password' => bcrypt('password123'),
                    'role' => $user[2],
                    'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info('Seeder berhasil! 100+ data user dummy Indonesia telah ditambahkan.');
    }
}
