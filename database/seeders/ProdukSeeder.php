<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produks = [
            [
                'nama' => 'Kaos Polos Premium',
                'deskripsi' => 'Kaos polos berbahan cotton combed 30s yang nyaman dipakai',
                'harga' => 75000,
                'lokasi' => 'Jakarta',
                'jumlah_terjual' => 150,
                'kategori_id' => 1,
                'is_active' => true,
            ],
            [
                'nama' => 'Kaos Distro Kekinian',
                'deskripsi' => 'Kaos dengan desain unik dan trendy untuk anak muda',
                'harga' => 85000,
                'lokasi' => 'Bandung',
                'jumlah_terjual' => 89,
                'kategori_id' => 1,
                'is_active' => true,
            ],
            [
                'nama' => 'Kaos Wanita Crop Top',
                'deskripsi' => 'Kaos crop top stylish untuk wanita modern',
                'harga' => 65000,
                'lokasi' => 'Surabaya',
                'jumlah_terjual' => 234,
                'kategori_id' => 2,
                'is_active' => true,
            ],
            [
                'nama' => 'Kemeja Formal Pria',
                'deskripsi' => 'Kemeja formal untuk kerja dan acara resmi',
                'harga' => 125000,
                'lokasi' => 'Jakarta',
                'jumlah_terjual' => 67,
                'kategori_id' => 3,
                'is_active' => true,
            ],
            [
                'nama' => 'Jaket Hoodie Unisex',
                'deskripsi' => 'Jaket hoodie nyaman untuk pria dan wanita',
                'harga' => 165000,
                'lokasi' => 'Yogyakarta',
                'jumlah_terjual' => 123,
                'kategori_id' => 4,
                'is_active' => true,
            ],
            [
                'nama' => 'Celana Jeans Pria',
                'deskripsi' => 'Celana jeans berkualitas dengan model slim fit',
                'harga' => 185000,
                'lokasi' => 'Bandung',
                'jumlah_terjual' => 98,
                'kategori_id' => 5,
                'is_active' => true,
            ],
            [
                'nama' => 'Dress Casual Wanita',
                'deskripsi' => 'Dress casual yang cocok untuk hangout dan santai',
                'harga' => 145000,
                'lokasi' => 'Bali',
                'jumlah_terjual' => 156,
                'kategori_id' => 6,
                'is_active' => true,
            ],
            [
                'nama' => 'Kaos Oversize Trendy',
                'deskripsi' => 'Kaos oversize yang lagi trend di kalangan remaja',
                'harga' => 95000,
                'lokasi' => 'Solo',
                'jumlah_terjual' => 78,
                'kategori_id' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}
