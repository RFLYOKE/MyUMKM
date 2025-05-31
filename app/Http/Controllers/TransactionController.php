<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
     public function index()
    {
        $pesanans = Pesanan::with([
            'payment',
            'pesananItems.produk.gambarUtama'
        ])
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

        return view('transaction', compact('pesanans'));
    }
}
