<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@ppid.com'],
            [
                'name' => 'Admin PPID',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Operator User (Customer Service)
        User::updateOrCreate(
            ['email' => 'operator@ppid.com'],
            [
                'name' => 'Operator CS',
                'password' => Hash::make('password'),
                'role' => 'operator'
            ]
        );
    }
}
