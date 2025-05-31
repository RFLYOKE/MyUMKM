@extends('layouts.main')

@section('title', 'Cart | MyUMKM')

@section('header')
@section('page', 'Keranjang')
@include('components.header.topHeader')
<div class="p-6 flex flex-col gap-y-4 mb-20">
    @foreach ($keranjangs as $item)
        @include('components.cart-product')
    @endforeach

    {{-- Tombol Checkout --}}
    <div class="mt-6">
        <a href="{{ route('checkout') }}"
           class="block text-center bg-[#E27D31] hover:bg-[#e49300] text-white font-semibold py-3 rounded-lg">
            Checkout
        </a>
    </div>
</div>
@endsection
