@extends('layouts.main')

@section('title', 'Checkout | MyUMKM')

@section('header')
@section('page', 'Checkout')
@include('components.header.topHeader')
@endsection

@section('content')
<div class="px-4 py-3 space-y-6 text-black text-sm mb-20">

    {{-- Alamat & Kecamatan --}}
    <div class="flex justify-between items-start">
        <div>
            <p class="font-bold">Alamat Saya</p>
            <p class="mt-1">Jl.sarwodadi IV no.809 berkoh purwokerto selatan,<br>
                kelurahan purwokerto kidul kecamatan purwokerto selatan, Kabupaten BANYUMAS
            </p>
        </div>
        <p class="font-semibold">Rawalo</p>
    </div>

    {{-- Produk --}}
    <div class="flex items-start gap-4">
        <img src="/img/kaos.png" alt="Baju Hitam Polos" class="w-20 h-20 object-cover rounded">
        <div class="flex flex-col gap-1">
            <p class="font-semibold">Baju Hitam Polos</p>
            <p class="font-bold text-base">Rp 167.000</p>
            <p>Ukuran <span class="font-semibold">L</span></p>
        </div>
    </div>

    {{-- Info Pengiriman --}}
    <div class="border border-black rounded p-4 space-y-2">
        <p class="text-green-700 font-bold italic">Gratis ongkir</p>
        <p class="text-xs">Estimasi tiba 4-7 Nov</p>

        <div class="flex items-center gap-2">
            <input type="checkbox" class="accent-black">
            <p class="text-gray-600">Biaya Asuransi Pengiriman (Rp10.000)</p>
        </div>
    </div>

    {{-- Promo --}}
    <div class="border border-black rounded p-4 space-y-2">
        <p class="font-bold">2 Kupon promo berhasil dipakai!</p>
        <p class="text-xs text-gray-600">Kamu hemat Rp20.000</p>
        <div class="flex justify-between">
            <p>Diskon Barang</p>
            <p>Rp10.000</p>
        </div>
        <div class="flex justify-between">
            <p>Bebas Ongkir</p>
            <p>Rp20.000</p>
        </div>
    </div>

    {{-- Metode Pembayaran --}}
    <div class="border border-black rounded p-4 space-y-2">
        <div class="flex justify-between items-center">
            <p class="font-semibold">Metode pembayaran</p>
        </div>

        <div class="flex flex-col items-start justify-center gap-6 mt-2">
            <label class="w-full flex items-center justify-between gap-2">
                <img src="/icon/dana.png" alt="DANA" class="w-16">
                <input type="checkbox" class="accent-black">
            </label>
            <label class="w-full flex items-center justify-between gap-2">
                <img src="/icon/ovo.png" alt="OVO" class="w-16">
                <input type="checkbox" class="accent-black">
            </label>
            <label class="w-full flex items-center justify-between gap-2">
                <img src="/icon/gopay.png" alt="gopay" class="w-16">
                <input type="checkbox" class="accent-black">
            </label>
            <label class="w-full flex items-center justify-between gap-2">
                <img src="/icon/shopee-pay.png" alt="shopee pay" class="w-16">
                <input type="checkbox" class="accent-black">
            </label>
        </div>
    </div>

    {{-- Ringkasan Transaksi --}}
    <div class="border border-black rounded p-4 space-y-2">
        <p class="font-semibold">Ringkasan Transaksi</p>
        <div class="flex justify-between">
            <p>Total Harga</p>
            <p><s>Rp169.000</s> Rp 159.000</p>
        </div>
        <div class="flex justify-between">
            <p>Total Ongkos Kirim</p>
            <p><s>Rp20.000</s> Rp0</p>
        </div>
        <div class="flex justify-between">
            <p>Total Asuransi</p>
            <p>Rp10.000</p>
        </div>
        <div class="flex justify-between">
            <p>Biaya jasa Aplikasi</p>
            <p>Rp1.000</p>
        </div>
        <div class="flex justify-between">
            <p>Biaya Layanan</p>
            <p>Rp1.000</p>
        </div>
        <hr>
        <div class="flex justify-between font-bold text-base">
            <p>Total Biaya</p>
            <p>Rp171.000</p>
        </div>
    </div>

    {{-- Tombol Bayar --}}
    <div class="text-center">
        <button class="w-full bg-[#ea8e49] hover:bg-[#d87c38] text-white font-bold py-3 rounded-md">
            Bayar Sekarang
        </button>
    </div>
</div>
@endsection
