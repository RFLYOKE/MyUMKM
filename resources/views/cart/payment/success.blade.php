@extends('layouts.main')

@section('title', 'Method Payment | MyUMKM')

@section('content')
    <div class="w-full px-4 py-6">
        {{-- Tombol kembali --}}
        <div class="flex items-center mb-6 gap-x-4">
            <img src="{{ asset('icon/arrow-left-black.png') }}" alt="Back" onclick="location.href='/dashboard'">
            <h1 class="text-lg font-semibold">Kembali</h1>
        </div>

        <div class="w-3/4 mx-auto mt-6">
            <div class="bg-[#4A7744] px-6 py-8 flex flex-col items-center rounded-xl">
                <img src="{{ asset('icon/200-ok.png') }}" alt="Success" class="w-16 h-16 mb-4">
                <h2 class="text-black text-xl font-semibold">Transaksi Selesai</h2>
            </div>
        </div>
    </div>
@endsection
