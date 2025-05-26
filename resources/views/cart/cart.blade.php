@extends('layouts.main')

@section('title', 'Cart | MyUMKM')

@section('header')
@section('page', 'Keranjang')
@include('components.header.topHeader')
<div class="p-6 flex flex-col gap-y-4 mb-20">
    <!-- Search Section -->
    <div class="flex items-center border border-[#5a3d2e] rounded-lg px-3 w-3/4">
        <!-- Search Icon -->
        <img src="/icon/searchIcon.png" alt="Search" class="w-5 h-5 mr-2" />
        <input type="text" placeholder="Cari transaksi"
            class="text-sm text-gray-700 placeholder-gray-700 bg-transparent border-none focus:outline-none py-2 w-full" />
        <button class="text-lg font-semibold text-black ml-4">Cari</button>
    </div>
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-x-2">
            <p class="text-md font-bold text-black">Pilih Semua</p>
            <input type="checkbox">
        </div>
        <div class="flex items-center gap-x-2">
            <p class="text-md font-bold text-black">Hapus Semua</p>
            <img src="{{ asset('icon/trash.png') }}" alt="">
        </div>
    </div>
    @for ($i = 0; $i < 4; $i++)
        @include('components.cart-product')
    @endfor
</div>
@endsection
