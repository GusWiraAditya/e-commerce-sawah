<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'], // Kunci untuk mencari
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'), // Ganti dengan password yang aman jika perlu
                'isAdmin' => true,
            ]
        );
    }
}