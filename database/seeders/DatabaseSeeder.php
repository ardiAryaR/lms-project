<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Utama',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Budi Guru',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'guru',
            'nrg' => '123456789',
        ]);

        User::factory()->create([
            'name' => 'Siti Murid',
            'email' => 'murid@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'murid',
            'nis' => '987654321',
        ]);
    }
}
