@extends('layouts.main')

@section('title', 'Wellcome | MyUMKM')

@section('content')
    <div class="w-full h-screen flex items-center justify-center">
        <div class="flex flex-col items-center justify-center">
            <img src="{{ asset('icon/iconUMKM.png') }}" alt="">
            <h1 class="text-lg font-semibold">Selamat Datang</h1>
            <a href="{{ route('login') }}" class="px-6 py-2 text-white font-semibold rounded-full bg-[#A79277] my-3">Login</a>
        </div>
    </div>
@endsection
