<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            [
                'nama' => 'Kaos Pria',
                'deskripsi' => 'Koleksi kaos untuk pria dengan berbagai model dan warna',
                'gambar' => 'kategori/kaos-pria.png',
            ],
            [
                'nama' => 'Kaos Wanita',
                'deskripsi' => 'Koleksi kaos untuk wanita dengan desain trendy',
                'gambar' => 'kategori/kaos-wanita.png',
            ],
            [
                'nama' => 'Kemeja',
                'deskripsi' => 'Kemeja formal dan casual untuk berbagai acara',
                'gambar' => 'kategori/kemeja.png',
            ],
            [
                'nama' => 'Jaket',
                'deskripsi' => 'Jaket dan hoodie untuk cuaca dingin',
                'gambar' => 'kategori/jaket.png',
            ],
            [
                'nama' => 'Celana',
                'deskripsi' => 'Celana jeans, chino, dan casual wear',
                'gambar' => 'kategori/celana.png',
            ],
            [
                'nama' => 'Dress',
                'deskripsi' => 'Dress cantik untuk berbagai kesempatan',
                'gambar' => 'kategori/dress.png',
            ],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
