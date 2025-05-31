@extends('layouts.main')

@section('title', 'Detail Product | MyUMKM')

@section('header')
    @include('components.header.search-header')
@endsection

@section('content')
    <div class="w-full mx-auto px-4 py-6 space-y-6 pb-40"> {{-- Ditinggikan agar tombol tidak ketutup navbar --}}

        {{-- Swiper CSS CDN --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

        {{-- Gambar Produk (Swiper) --}}
        <div class="flex justify-center">
            <div class="swiper mySwiper w-full max-w-[28rem]">
                <div class="swiper-wrapper">
                    @foreach ($produk->produkGambars as $gambar)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $gambar->gambar) }}"
                                alt="{{ $produk->nama }}"
                                class="w-full h-auto object-cover rounded">
                        </div>
                    @endforeach
                </div>
                @if ($produk->produkGambars->count() > 1)
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                @endif
                <div class="swiper-pagination"></div>
            </div>
        </div>

        {{-- Swiper JS CDN --}}
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new Swiper(".mySwiper", {
                    loop: true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                });
            });
        </script>

        {{-- Info Terjual --}}
        <p class="text-right text-sm text-black font-medium">{{ $produk->jumlah_terjual }}+ Terjual</p>

        {{-- Informasi Produk --}}
        <div class="border border-black rounded-md p-4 space-y-4">
            <div>
                <p class="text-xl font-bold text-black">{{ $produk->nama }}</p>
                <p class="text-lg font-bold text-black">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
            </div>

            {{-- Ukuran --}}
            <div class="text-center">
                <p class="font-semibold text-black mb-2">Ukuran</p>
                <div class="flex flex-wrap justify-center gap-4">
                    @foreach ($produk->detailProduks as $detail)
                        <div class="flex flex-col items-center">
                            <label class="px-3 py-1 border border-black rounded-full text-sm
                                {{ $detail->stok == 0 ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : '' }}">
                                {{ $detail->ukuran }}
                            </label>
                            <input type="radio" name="ukuran" value="{{ $detail->ukuran }}"
                                   class="mt-1 accent-black"
                                   form="keranjangForm"
                                   {{ $detail->stok == 0 ? 'disabled' : '' }}>
                            <span class="text-xs text-gray-500 mt-1">Stok: {{ $detail->stok }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Form Tambah Keranjang --}}
        <form action="{{ route('cart.create') }}" method="POST" id="keranjangForm" class="space-y-6">
            @csrf

            {{-- Pilih Jumlah --}}
            <div>
                <p class="font-semibold text-black mb-1">Jumlah</p>
                <div class="flex items-center gap-2">
                    <div class="flex items-center border border-black rounded px-4 py-1">
                        <button type="button" class="text-xl font-bold px-2" onclick="ubahJumlah(-1)">-</button>
                        <span id="jumlahTeks" class="mx-2 text-base">1</span>
                        <button type="button" class="text-xl font-bold px-2" onclick="ubahJumlah(1)">+</button>
                    </div>
                </div>
                <input type="hidden" name="jumlah_beli" id="jumlahInput" value="1">
            </div>

            {{-- Keranjang & Tombol --}}
            <div class="flex justify-between items-center">
                <a href="/cart">
                    <img src="/icon/cartIcon.png" alt="Keranjang" class="w-8 h-8">
                </a>

                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                <button type="submit"
                    class="bg-[#ea8e49] hover:bg-[#d87c38] text-white font-semibold text-sm px-6 py-2 rounded-md">
                    Tambahkan ke Keranjang
                </button>
            </div>
        </form>
    </div>

    {{-- Script Jumlah --}}
    <script>
        function ubahJumlah(delta) {
            const jumlahInput = document.getElementById('jumlahInput');
            const jumlahTeks = document.getElementById('jumlahTeks');

            let jumlah = parseInt(jumlahInput.value);
            jumlah += delta;

            if (jumlah < 1) jumlah = 1;

            jumlahInput.value = jumlah;
            jumlahTeks.textContent = jumlah;
        }
    </script>
@endsection
