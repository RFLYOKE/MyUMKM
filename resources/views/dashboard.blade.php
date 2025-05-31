@extends('layouts.main')

@section('title', 'Dashboard | MyUMKM')

@section('header')
    @include('components.header.dashboardHeader')
@endsection

@section('content')
    @include('components.corousel')
    <div class="flex justify-evenly my-3">
        <div class="flex items-center gap-x-2 text-black font-semibold bg-[#E27D31] px-4 py-2 rounded-lg">
            <img src="{{ asset('icon/alamat.png') }}" alt="">
            <p>Alamat Pengiriman</p>
        </div>
    </div>
    <div class="flex justify-evenly flex-wrap gap-6">
        @foreach ($kategoris as $kategori)
            <div class="flex flex-col gap-y-1 items-center">
                <span class="bg-[#E27D31] w-12 h-12 flex items-center justify-center rounded-full">
                    {{-- Gambar dari kategori, default jika null --}}
                    @if ($kategori->gambar)
                        <img src="{{ asset('storage/' . $kategori->gambar) }}" alt="" class="w-8 h-8 object-cover" />
                    @else
                        <img src="{{ asset('icon/Shirt.png') }}" alt="" class="w-8 h-8" />
                    @endif
                </span>
                <p class="font-semibold text-sm text-center">{{ $kategori->nama }}</p>
            </div>
        @endforeach
    </div>
    @include('components.flashsale')
    @include('components.products')
@endsection
