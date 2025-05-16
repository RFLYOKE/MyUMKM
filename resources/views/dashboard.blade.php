@extends('layouts.main')

@section('title', 'Dashboard | MyUMKM')

@section('header')
    @include('components.dashboardHeader')
@endsection

@section('content')
    @include('components.corousel')
    <div class="flex justify-evenly my-3">
        <div class="flex items-center gap-x-2 text-black font-semibold bg-[#E27D31] px-4 py-2 rounded-lg">
            <img src="{{ asset('icon/voucher.png') }}" alt="">
            <p>Voucher</p>
        </div>
        <div class="flex items-center gap-x-2 text-black font-semibold bg-[#E27D31] px-4 py-2 rounded-lg">
            <img src="{{ asset('icon/alamat.png') }}" alt="">
            <p>Alamat Pengiriman</p>
        </div>
    </div>
    <div class="flex justify-evenly">
        <div class="flex flex-col gap-y-1 items-center">
            <span class="bg-[#E27D31] w-12 h-12 flex items-center justify-center rounded-full">
                <img src="{{ asset('icon/eat.png') }}" alt="" class="w-6 h-6" />
            </span>
            <p class="font-semibold">Makanan</p>
        </div>
        <div class="flex flex-col gap-y-1 items-center">
            <span class="bg-[#E27D31] w-12 h-12 flex items-center justify-center rounded-full">
                <img src="{{ asset('icon/Shirt.png') }}" alt="" class="w-8 h-8" />
            </span>
            <p class="font-semibold">Fashion</p>
        </div>
        <div class="flex flex-col gap-y-1 items-center">
            <span class="bg-[#E27D31] w-12 h-12 flex items-center justify-center rounded-full">
                <img src="{{ asset('icon/Wand.png') }}" alt="" class="w-8 h-8" />
            </span>
            <p class="font-semibold">Kerajinan Tangan</p>
        </div>
    </div>
    @include('components.flashsale')
@endsection
