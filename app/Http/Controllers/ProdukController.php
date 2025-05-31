<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function show($id)
    {
        $produk = Produk::with(['detailProduks', 'produkGambars'])->findOrFail($id);
        return view('cart.detail-product', compact('produk'));
    }
}
