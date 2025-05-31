<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\ProdukGambar;

class ProdukGambarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produkGambars = [
            // Kaos Polos Premium (ID: 1)
            [
                'produk_id' => 1,
                'gambar' => 'produk/kaos-polos-1.jpg',
                'is_primary' => true,
                'urutan' => 1,
            ],
            [
                'produk_id' => 1,
                'gambar' => 'produk/kaos-polos-2.jpg',
                'is_primary' => false,
                'urutan' => 2,
            ],
            [
                'produk_id' => 1,
                'gambar' => 'produk/kaos-polos-3.jpg',
                'is_primary' => false,
                'urutan' => 3,
            ],

            // Kaos Distro Kekinian (ID: 2)
            [
                'produk_id' => 2,
                'gambar' => 'produk/kaos-distro-1.jpg',
                'is_primary' => true,
                'urutan' => 1,
            ],
            [
                'produk_id' => 2,
                'gambar' => 'produk/kaos-distro-2.jpg',
                'is_primary' => false,
                'urutan' => 2,
            ],

            // Kaos Wanita Crop Top (ID: 3)
            [
                'produk_id' => 3,
                'gambar' => 'produk/crop-top-1.jpg',
                'is_primary' => true,
                'urutan' => 1,
            ],
            [
                'produk_id' => 3,
                'gambar' => 'produk/crop-top-2.jpg',
                'is_primary' => false,
                'urutan' => 2,
            ],
            [
                'produk_id' => 3,
                'gambar' => 'produk/crop-top-3.jpg',
                'is_primary' => false,
                'urutan' => 3,
            ],

            // Kemeja Formal Pria (ID: 4)
            [
                'produk_id' => 4,
                'gambar' => 'produk/kemeja-formal-1.jpg',
                'is_primary' => true,
                'urutan' => 1,
            ],
            [
                'produk_id' => 4,
                'gambar' => 'produk/kemeja-formal-2.jpg',
                'is_primary' => false,
                'urutan' => 2,
            ],

            // Jaket Hoodie Unisex (ID: 5)
            [
                'produk_id' => 5,
                'gambar' => 'produk/hoodie-1.jpg',
                'is_primary' => true,
                'urutan' => 1,
            ],
            [
                'produk_id' => 5,
                'gambar' => 'produk/hoodie-2.jpg',
                'is_primary' => false,
                'urutan' => 2,
            ],
            [
                'produk_id' => 5,
                'gambar' => 'produk/hoodie-3.jpg',
                'is_primary' => false,
                'urutan' => 3,
            ],

            // Celana Jeans Pria (ID: 6)
            [
                'produk_id' => 6,
                'gambar' => 'produk/jeans-1.jpg',
                'is_primary' => true,
                'urutan' => 1,
            ],
            [
                'produk_id' => 6,
                'gambar' => 'produk/jeans-2.jpg',
                'is_primary' => false,
                'urutan' => 2,
            ],

            // Dress Casual Wanita (ID: 7)
            [
                'produk_id' => 7,
                'gambar' => 'produk/dress-casual-1.jpg',
                'is_primary' => true,
                'urutan' => 1,
            ],
            [
                'produk_id' => 7,
                'gambar' => 'produk/dress-casual-2.jpg',
                'is_primary' => false,
                'urutan' => 2,
            ],
            [
                'produk_id' => 7,
                'gambar' => 'produk/dress-casual-3.jpg',
                'is_primary' => false,
                'urutan' => 3,
            ],

            // Kaos Oversize Trendy (ID: 8)
            [
                'produk_id' => 8,
                'gambar' => 'produk/oversize-1.jpg',
                'is_primary' => true,
                'urutan' => 1,
            ],
            [
                'produk_id' => 8,
                'gambar' => 'produk/oversize-2.jpg',
                'is_primary' => false,
                'urutan' => 2,
            ],
        ];

        foreach ($produkGambars as $gambar) {
            ProdukGambar::create($gambar);
        }
    }
}
