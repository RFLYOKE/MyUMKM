<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all(); 

        $produkFlashSale = Produk::with('gambarUtama')
            ->where('is_active', true)
            ->orderByDesc('created_at')
            ->take(4)
            ->get();
        
        $produkUntukAnda = Produk::with('gambarUtama')
            ->where('is_active', true)
            ->orderByDesc('created_at')
            ->take(8)
            ->get();

        return view('dashboard', compact('kategoris', 'produkFlashSale', 'produkUntukAnda'));
    }
}
