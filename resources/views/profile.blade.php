@extends('layouts.main')

@section('title', 'Profile | MyUMKM')

@section('header')
    @include('components.header.profile-header')
    <div class="bg-[#A9CDA8] flex items-center gap-x-6 px-6 py-3">
        <img src="{{ asset('icon/arrow-right.png') }}" alt="">
        <p class="font-semibold">Buka Toko</p>
    </div>
    <div class="py-6 px-4 flex flex-col gap-y-8">
        <div class="flex items-center gap-x-2">
            <img src="{{ asset('icon/star.png') }}" alt="">
            <p>Ulasan</p>
        </div>
        <div class="flex items-center gap-x-2">
            <img src="{{ asset('icon/wish.png') }}" alt="">
            <p>Wishlist</p>
        </div>
        <div class="flex items-center gap-x-2">
            <img src="{{ asset('icon/cartIcon.png') }}" alt="">
            <p>Belanja lagi</p>
        </div>
        <div class="flex items-center gap-x-2">
            <img src="{{ asset('icon/setting.png') }}" alt="">
            <p>Pengaturan</p>
        </div>
        <div class="flex items-center gap-x-2">
            <img src="{{ asset('icon/cs.png') }}" alt="">
            <p>Customer Services</p>
        </div>
    </div>
@endsection