<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Use a strong password in production
            'role' => 'admin',
            'status' => true,
        ]);

        // Associate User
        User::create([
            'name' => 'Associate User',
            'email' => 'associate@example.com',
            'password' => Hash::make('password'),
            'role' => 'associate',
            'status' => true,
        ]);
    }
}
