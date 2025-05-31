@extends('layouts.main')

@section('title', 'Checkout | MyUMKM')

@section('header')
@section('page', 'Checkout')
@include('components.header.topHeader')
@endsection

@section('content')
<form action="{{ route('checkout.store') }}" method="POST">
    @csrf
    <div class="px-4 py-3 space-y-6 text-black text-sm mb-20">

        {{-- Alamat & Kecamatan --}}
        <div class="flex justify-between items-start">
            <div>
                <p class="font-bold">Alamat Saya</p>
                <p class="mt-1">
                    {{ $alamat->alamat_lengkap }}<br>
                    kelurahan {{ $alamat->kelurahan ?? '-' }}, kecamatan {{ $alamat->kecamatan }}, Kabupaten {{ $alamat->kabupaten }}
                </p>
            </div>
            <p class="font-semibold">{{ $alamat->kecamatan }}</p>
        </div>

        {{-- Daftar Produk --}}
        @foreach ($keranjangs as $item)
            <div class="flex items-start gap-4">
                <img src="{{ asset('storage/' . ($item->produk->produkGambars->first()->gambar ?? 'default.jpg')) }}"
                    alt="{{ $item->produk->nama }}" class="w-20 h-20 object-cover rounded">
                <div class="flex flex-col gap-1">
                    <p class="font-semibold">{{ $item->produk->nama }}</p>
                    <p class="font-bold text-base">Rp {{ number_format($item->sub_total, 0, ',', '.') }}</p>
                    <p>Ukuran <span class="font-semibold">{{ $item->ukuran }}</span></p>
                </div>
            </div>
        @endforeach

        {{-- Info Pengiriman --}}
        <div class="border border-black rounded p-4 space-y-2">
            <p class="text-green-700 font-bold italic">Gratis ongkir</p>
            <p class="text-xs">Estimasi tiba 4-7 Nov</p>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="asuransi" value="1" class="accent-black">
                <p class="text-gray-600">Biaya Asuransi Pengiriman (Rp10.000)</p>
            </div>
        </div>

        {{-- Metode Pembayaran --}}
        <div class="border border-black rounded p-4 space-y-2">
            <p class="font-semibold mb-2">Metode pembayaran</p>

            <div class="flex flex-col gap-3">
                @php
                    $metodes = ['DANA', 'OVO', 'GOPAY', 'SHOPEE_PAY'];
                @endphp

                @foreach ($metodes as $metode)
                    <label class="flex items-center justify-between gap-2">
                        <div class="flex items-center gap-2">
                            <img src="/icon/{{ strtolower(str_replace('_', '-', $metode)) }}.png"
                                alt="{{ $metode }}" class="w-16">
                            <span class="text-sm">{{ $metode }}</span>
                        </div>
                        <input type="radio" name="metode_pembayaran" value="{{ $metode }}" class="accent-black" required>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Ringkasan Transaksi --}}
        <div class="border border-black rounded p-4 space-y-2">
            <p class="font-semibold">Ringkasan Transaksi</p>
            <div class="flex justify-between">
                <p>Total Harga</p>
                <p>Rp {{ number_format($keranjangs->sum('sub_total'), 0, ',', '.') }}</p>
            </div>
            <div class="flex justify-between">
                <p>Total Ongkos Kirim</p>
                <p><s>Rp20.000</s> Rp0</p>
            </div>
            <div class="flex justify-between">
                <p>Total Asuransi</p>
                <p>Rp0</p>
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
                <p>
                    Rp
                    {{ number_format($keranjangs->sum('sub_total') + 1000 + 1000 + 0, 0, ',', '.') }}
                </p>
            </div>
        </div>

        {{-- Tombol Bayar --}}
        <div class="text-center">
            <button type="submit" class="w-full bg-[#ea8e49] hover:bg-[#d87c38] text-white font-bold py-3 rounded-md">
                Bayar Sekarang
            </button>
        </div>
    </div>
</form>
@endsection
