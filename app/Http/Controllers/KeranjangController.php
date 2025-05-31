<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    // Tampilkan semua item di keranjang pengguna
    public function show()
    {
        $keranjangs = Keranjang::with('produk')->where('user_id', Auth::id())->get();
        return view('cart.cart', compact('keranjangs'));
    }

    // Tambah item ke keranjang
    public function create(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'ukuran' => 'required',
            'jumlah_beli' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $userId = Auth::id();

        // Cari apakah item dengan produk_id + ukuran sudah ada di keranjang user
        $existing = Keranjang::where('user_id', $userId)
            ->where('produk_id', $request->produk_id)
            ->where('ukuran', $request->ukuran)
            ->first();

        if ($existing) {
            // Jika ada, tambahkan jumlah dan update sub_total
            $existing->jumlah_beli += $request->jumlah_beli;
            $existing->sub_total = $existing->jumlah_beli * $produk->harga;
            $existing->save();
        } else {
            // Jika tidak ada, buat entri baru
            Keranjang::create([
                'user_id' => $userId,
                'produk_id' => $request->produk_id,
                'ukuran' => $request->ukuran,
                'jumlah_beli' => $request->jumlah_beli,
                'sub_total' => $produk->harga * $request->jumlah_beli,
            ]);
        }

        return redirect()->route('cart.show')->with('success', 'Produk berhasil dimasukkan ke keranjang.');
    }


    public function update(Request $request, Keranjang $keranjang)
    {
        $request->validate([
            'jumlah_beli' => 'required|integer|min:1',
        ]);

        $keranjang->update([
            'jumlah_beli' => $request->jumlah_beli,
            'sub_total' => $keranjang->produk->harga * $request->jumlah_beli,
        ]);

        return back()->with('success', 'Jumlah berhasil diperbarui.');
    }

    public function destroy(Keranjang $keranjang)
    {
        if ($keranjang->user_id === Auth::id()) {
            $keranjang->delete();
        }

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }

}
