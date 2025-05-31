<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function show($id)
    {
        $payment = Payment::with('pesanan')->findOrFail($id);
        return view('cart.payment.payment', compact('payment'));
    }

    public function confirmForm(Pesanan $pesanan)
    {
        return view('cart.payment.confirm-payment', compact('pesanan'));
    }

    public function processPayment(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'no_ewallet' => 'required|string',
            'total_pembayaran' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            // Update payment
            $payment = $pesanan->payment;
            $payment->update([
                'no_ewallet' => $request->no_ewallet,
                'total_pembayaran' => $request->total_pembayaran,
                'status_bayar' => 'sukses',
                'tanggal_bayar' => now(),
            ]);

            // Update pesanan status
            $pesanan->update(['status_pesanan' => 'diproses']);

            // Kurangi stok
            foreach ($pesanan->pesananItems as $item) {
                $produk = $item->produk;

                // Cari detail produk berdasarkan produk_id dan ukuran
                $detailProduk = $produk->detailProduks()
                    ->where('ukuran', $item->ukuran)
                    ->first();

                if (!$detailProduk || $detailProduk->stok < $item->jumlah_beli) {
                    DB::rollBack();
                    return back()->withErrors(['error' => 'Stok tidak mencukupi untuk produk ' . $produk->nama . ' ukuran ' . $item->ukuran]);
                }

                // Kurangi stok
                $detailProduk->stok -= $item->jumlah_beli;
                $detailProduk->save();
            }

            DB::commit();
            return redirect()->route('payment.success');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memproses pembayaran.']);
        }
    }

    public function success()
    {
        return view('cart.payment.success');
    }
}
    