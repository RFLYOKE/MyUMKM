@extends('layouts.main')

@section('title', 'Detail Product | MyUMKM')

@section('header')
    @include('components.header.search-header')
@endsection

@section('content')
    <div class="w-full mx-auto px-4 py-6 space-y-6">
        {{-- Gambar Produk --}}
        <div class="w-full flex justify-center">
            <img src="/img/kaos-large.png" alt="Baju Hitam Polos" class="w-[28rem] h-auto object-cover rounded">
        </div>

        {{-- Info Terjual --}}
        <p class="text-right text-sm text-black font-medium">100+ Terjual</p>

        {{-- Informasi Produk --}}
        <div class="border border-black rounded-md p-4 space-y-4">
            <div>
                <p class="text-xl font-bold text-black">Baju Hitam Polos</p>
                <p class="text-lg font-bold text-black">Rp169.000</p>
            </div>

            {{-- Ukuran --}}
            <div class="text-center">
                <p class="font-semibold text-black mb-2">Ukuran</p>
                <div class="flex justify-between px-2">
                    @foreach (['M', 'S', 'L', 'XL'] as $size)
                        <div class="flex flex-col items-center">
                            <label class="px-3 py-1 border border-black rounded-full text-sm">{{ $size }}</label>
                            <input type="checkbox" class="mt-1 accent-black">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Jumlah dan Aksi --}}
        <div class="space-y-6">
            {{-- Jumlah --}}
            <div>
                <p class="font-semibold text-black mb-1">Jumlah</p>
                <div class="flex items-center gap-2">
                    <div class="flex items-center border border-black rounded px-4 py-1">
                        <button class="text-xl font-bold px-2">-</button>
                        <span class="mx-2 text-base">1</span>
                        <button class="text-xl font-bold px-2">+</button>
                    </div>
                </div>
            </div>

            {{-- Ikon Keranjang dan Tombol Pesan --}}
            <div class="flex justify-between items-center">
                <button>
                    <img src="/icon/cartIcon.png" alt="Keranjang" class="w-8 h-8" onclick="location.href='/cart'">
                </button>

                <button class="bg-[#ea8e49] hover:bg-[#d87c38] text-white font-semibold text-sm px-6 py-2 rounded-md">
                    Buat Pesanan
                </button>
            </div>
        </div>
    </div>
@endsection
