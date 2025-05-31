<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\AlamatPengirim;

class AlamatPengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alamatPengirimans = [
            // Alamat untuk Budi Santoso (User ID: 2)
            [
                'user_id' => 2,
                'nama_penerima' => 'Budi Santoso',
                'no_hp_penerima' => '082345678901',
                'alamat_lengkap' => 'Jl. Merdeka No. 123, RT 05/RW 12',
                'kecamatan' => 'Purwokerto Selatan',
                'kabupaten' => 'Banyumas',
                'provinsi' => 'Jawa Tengah',
                'kode_pos' => '53141',
                'is_default' => true,
            ],
            [
                'user_id' => 2,
                'nama_penerima' => 'Budi Santoso',
                'no_hp_penerima' => '082345678901',
                'alamat_lengkap' => 'Jl. Gatot Subroto No. 456, RT 02/RW 08',
                'kecamatan' => 'Purwokerto Utara',
                'kabupaten' => 'Banyumas',
                'provinsi' => 'Jawa Tengah',
                'kode_pos' => '53122',
                'is_default' => false,
            ],

            // Alamat untuk Siti Nurhaliza (User ID: 3)
            [
                'user_id' => 3,
                'nama_penerima' => 'Siti Nurhaliza',
                'no_hp_penerima' => '083456789012',
                'alamat_lengkap' => 'Jl. Sudirman No. 456, RT 03/RW 07',
                'kecamatan' => 'Sokaraja',
                'kabupaten' => 'Banyumas',
                'provinsi' => 'Jawa Tengah',
                'kode_pos' => '53181',
                'is_default' => true,
            ],
            [
                'user_id' => 3,
                'nama_penerima' => 'Siti Nurhaliza',
                'no_hp_penerima' => '083456789012',
                'alamat_lengkap' => 'Perum Griya Satria Blok A No. 15',
                'kecamatan' => 'Purwokerto Timur',
                'kabupaten' => 'Banyumas',
                'provinsi' => 'Jawa Tengah',
                'kode_pos' => '53114',
                'is_default' => false,
            ],
        ];

        foreach ($alamatPengirimans as $alamat) {
            AlamatPengirim::create($alamat);
        }
    }
}
