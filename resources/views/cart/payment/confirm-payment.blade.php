@extends('layouts.main')

@section('title', 'Method Payment | MyUMKM')

@section('content')
    <div class="px-4 py-6">
        {{-- Judul dan tombol kembali --}}
        <div class="flex items-center mb-4 gap-x-4">
            <img src="{{ asset('icon/arrow-left-black.png') }}" alt="" onclick="location.href='/cart/checkout/payment'">
            <h1 class="text-lg font-semibold">Metode Pembayaran</h1>
        </div>

        {{-- Kartu pembayaran --}}
        <div class="border border-black rounded-xl p-6 shadow-sm w-full mx-auto">
            {{-- Logo Dana --}}
            <div class="flex justify-center mb-4">
                <img src="{{ asset('icon/dana.png') }}" alt="Dana Logo" class="h-10">
            </div>

            {{-- Input Nomor Dana --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Masukkan Nomor Dana</label>
                <input type="number" class="w-full border border-gray-600 bg-transparent rounded-md px-4 py-2" required>
            </div>

            {{-- Input Nominal --}}
            <div class="mb-6">
                <label class="block font-semibold mb-1">Masukkan Nominal Transaksi</label>
                <input type="number" class="w-full border border-gray-600 bg-transparent rounded-md px-4 py-2" required>
            </div>

            {{-- Tombol Bayar --}}
            <div class="flex justify-end">
                <button class="bg-[#E27D31] hover:bg-[#e49300] text-white font-semibold px-6 py-2 rounded-lg">
                    Bayar
                </button>
            </div>
        </div>
    </div>
@endsection
