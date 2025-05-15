<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Admin user
        User::create([
            'name' => 'admin',
            'email' => 'admin@toko.com',
            'password' => Hash::make('12345678'), // Ganti password ini 
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);

        // Pelanggan user
        User::create([
            'name' => 'daniel',
            'email' => 'daniel@toko.com',
            'password' => Hash::make('12345678'), // Ganti password ini 
            'email_verified_at' => now(),
            'role' => 'costumer',
        ]);
    }
}
