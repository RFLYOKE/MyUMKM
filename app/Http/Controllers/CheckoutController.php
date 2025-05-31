<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlamatPengirim;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;
use App\Models\PesananItem;
use App\Models\Payment;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $alamat = AlamatPengirim::where('user_id', $user->id)->where('is_default', true)->first();

        // Fallback ke data user jika tidak ada alamat pengiriman
        if (!$alamat) {
            $alamat = (object) [
                'nama_penerima' => $user->name,
                'no_hp_penerima' => $user->no_hp,
                'alamat_lengkap' => $user->alamat_saya,
                'kelurahan' => '-',
                'kecamatan' => '-',
                'kabupaten' => '-',
                'provinsi' => '-',
                'kode_pos' => '-',
            ];
        }

        $keranjangs = Keranjang::with('produk.produkGambars')->where('user_id', $user->id)->get();

        return view('cart.checkout', compact('alamat', 'keranjangs'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $keranjangs = $user->keranjangs()->with('produk')->get();
        $alamat = $user->alamatPengirimans()->latest()->first() ?? $user; // fallback ke user jika tidak punya alamat

        $totalHarga = $keranjangs->sum('sub_total');
        $asuransi = $request->input('asuransi') ? 10000 : 0;
        $ongkir = 0;
        $biayaJasa = 1000;
        $biayaLayanan = 1000;

        $pesanan = Pesanan::create([
            'kode_pesanan' => 'INV-' . strtoupper(uniqid()),
            'user_id' => $user->id,
            'alamat_pengiriman_id' => $alamat->id,
            'total_harga' => $totalHarga,
            'total_ongkos_kirim' => $ongkir,
            'biaya_jasa_aplikasi' => $biayaJasa,
            'biaya_layanan' => $biayaLayanan,
            'total_biaya' => $totalHarga + $asuransi + $biayaJasa + $biayaLayanan,
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'status_pesanan' => 'pending',
        ]);

        foreach ($keranjangs as $item) {
            PesananItem::create([
                'pesanan_id' => $pesanan->id,
                'produk_id' => $item->produk_id,
                'ukuran' => $item->ukuran,
                'jumlah_beli' => $item->jumlah_beli,
                'harga_satuan' => $item->produk->harga,
                'sub_total' => $item->sub_total,
            ]);
        }

        // Opsional: kosongkan keranjang setelah checkout
        $user->keranjangs()->delete();

        // Buat data pembayaran
        $payment = Payment::create([
            'pesanan_id' => $pesanan->id,
            'kode_pembayaran' => 'PAY-' . strtoupper(uniqid()),
            'no_ewallet' => '0', // bisa dinamis jika diperlukan
            'total_pembayaran' => $pesanan->total_biaya,
            'status_bayar' => 'belum_bayar',
        ]);

        return redirect()->route('payment.show', $payment->id);
    }

}
