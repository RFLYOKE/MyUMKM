<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Admin User
        User::create([
            'name' => 'Aji MYUMKM',
            'email' => 'admin@myumkm.com',
            'alamat_saya' => 'Jl. Admin No. 1, Jakarta',
            'no_hp' => '081234567890',
            'jenis_kelamin' => 'L',
            'tgl_lahir' => '1990-01-01',
            'password' => Hash::make('123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Sample Customers
        User::create([
            'name' => 'Daniel',
            'email' => 'daniel@example.com',
            'alamat_saya' => 'Jl. Merdeka No. 123, Purwokerto',
            'no_hp' => '082345678901',
            'jenis_kelamin' => 'L',
            'tgl_lahir' => '1995-05-15',
            'password' => Hash::make('123'),
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Chandra',
            'email' => 'Chandra@example.com',
            'alamat_saya' => 'Jl. Sudirman No. 456, Banyumas',
            'no_hp' => '083456789012',
            'jenis_kelamin' => 'P',
            'tgl_lahir' => '1992-08-20',
            'password' => Hash::make('123'),
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);

    }
}
