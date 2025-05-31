<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\DetailProduk;

class DetailProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detailProduks = [
            // Kaos Polos Premium (ID: 1)
            ['produk_id' => 1, 'ukuran' => 'S', 'stok' => 25],
            ['produk_id' => 1, 'ukuran' => 'M', 'stok' => 30],
            ['produk_id' => 1, 'ukuran' => 'L', 'stok' => 35],
            ['produk_id' => 1, 'ukuran' => 'XL', 'stok' => 20],
            ['produk_id' => 1, 'ukuran' => 'XXL', 'stok' => 15],

            // Kaos Distro Kekinian (ID: 2)
            ['produk_id' => 2, 'ukuran' => 'S', 'stok' => 20],
            ['produk_id' => 2, 'ukuran' => 'M', 'stok' => 28],
            ['produk_id' => 2, 'ukuran' => 'L', 'stok' => 32],
            ['produk_id' => 2, 'ukuran' => 'XL', 'stok' => 18],
            ['produk_id' => 2, 'ukuran' => 'XXL', 'stok' => 12],

            // Kaos Wanita Crop Top (ID: 3)
            ['produk_id' => 3, 'ukuran' => 'S', 'stok' => 40],
            ['produk_id' => 3, 'ukuran' => 'M', 'stok' => 45],
            ['produk_id' => 3, 'ukuran' => 'L', 'stok' => 35],
            ['produk_id' => 3, 'ukuran' => 'XL', 'stok' => 25],

            // Kemeja Formal Pria (ID: 4)
            ['produk_id' => 4, 'ukuran' => 'S', 'stok' => 15],
            ['produk_id' => 4, 'ukuran' => 'M', 'stok' => 22],
            ['produk_id' => 4, 'ukuran' => 'L', 'stok' => 25],
            ['produk_id' => 4, 'ukuran' => 'XL', 'stok' => 18],
            ['produk_id' => 4, 'ukuran' => 'XXL', 'stok' => 10],

            // Jaket Hoodie Unisex (ID: 5)
            ['produk_id' => 5, 'ukuran' => 'S', 'stok' => 18],
            ['produk_id' => 5, 'ukuran' => 'M', 'stok' => 25],
            ['produk_id' => 5, 'ukuran' => 'L', 'stok' => 30],
            ['produk_id' => 5, 'ukuran' => 'XL', 'stok' => 22],
            ['produk_id' => 5, 'ukuran' => 'XXL', 'stok' => 15],

            // Celana Jeans Pria (ID: 6)
            ['produk_id' => 6, 'ukuran' => 'S', 'stok' => 12],
            ['produk_id' => 6, 'ukuran' => 'M', 'stok' => 20],
            ['produk_id' => 6, 'ukuran' => 'L', 'stok' => 25],
            ['produk_id' => 6, 'ukuran' => 'XL', 'stok' => 18],
            ['produk_id' => 6, 'ukuran' => 'XXL', 'stok' => 10],

            // Dress Casual Wanita (ID: 7)
            ['produk_id' => 7, 'ukuran' => 'S', 'stok' => 30],
            ['produk_id' => 7, 'ukuran' => 'M', 'stok' => 35],
            ['produk_id' => 7, 'ukuran' => 'L', 'stok' => 28],
            ['produk_id' => 7, 'ukuran' => 'XL', 'stok' => 20],

            // Kaos Oversize Trendy (ID: 8)
            ['produk_id' => 8, 'ukuran' => 'S', 'stok' => 22],
            ['produk_id' => 8, 'ukuran' => 'M', 'stok' => 28],
            ['produk_id' => 8, 'ukuran' => 'L', 'stok' => 32],
            ['produk_id' => 8, 'ukuran' => 'XL', 'stok' => 25],
            ['produk_id' => 8, 'ukuran' => 'XXL', 'stok' => 18],
        ];

        foreach ($detailProduks as $detail) {
            DetailProduk::create($detail);
        }
    }
}
