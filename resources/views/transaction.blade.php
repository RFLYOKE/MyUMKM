@extends('layouts.main')

@section('title', 'Transaction | MyUMKM')

@section('header')
@section('page', 'Transaksi')
@include('components.header.topHeader')
<div class="p-6 flex flex-col gap-y-4 mb-20">
    <!-- Search Section -->
    <div class="w-full flex items-center justify-between">
        <div class="flex items-center border border-[#5a3d2e] rounded-lg pl-3 w-full max-w-md">
            <!-- Search Icon -->
            <img src="/icon/searchIcon.png" alt="Search" class="w-5 h-5 mr-2" />
            <input type="text" placeholder="Cari transaksi"
                class="text-sm text-gray-700 placeholder-gray-700 bg-transparent border-none focus:outline-none py-2 w-full" />
        </div>
        <button class="text-lg font-semibold text-black ml-4">Cari</button>
    </div>
    @for ($i = 0; $i < 4; $i++)
        @include('components.transactionProducts')
    @endfor
</div>
@endsection
