@extends('layouts.auth')

@section('title', 'Register | MyUMKM')

@section('content')
    <div class="flex items-center justify-center w-full h-screen">
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="w-full border border-green-800 rounded-sm">
                <input
                    name="email"
                    class="pl-3 pr-10 py-3"
                    type="email"
                    placeholder="Email atau Nomer Ponsel"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror

            <div class="border border-green-800 rounded-sm mt-6">
                <input
                    name="name"
                    class="pl-3 pr-10 py-3"
                    type="text"
                    placeholder="Nama Pengguna"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror

            <div class="border border-green-800 rounded-sm mt-6">
                <input
                    name="password"
                    class="pl-3 pr-10 py-3"
                    type="password"
                    placeholder="Kata sandi"
                    required
                >
            </div>

            @error('password')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror

            <div class="border border-green-800 rounded-sm mt-6">
                <input
                    name="password_confirmation"
                    class="pl-3 pr-10 py-3"
                    type="password"
                    placeholder="Ketik ulang kata sandi"
                    required
                >
            </div>

            @error('password_confirmation')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror

            <div class="flex justify-end mt-2">
                <a href="{{ route('login') }}" class="text-[#4A7744] text-sm">Sudah punya akun?</a>
            </div>

            <div class="flex justify-center mt-4">
                <button type="submit"
                    class="w-3/5 py-2 text-sm bg-[#40693B] text-white font-semibold rounded-md hover:bg-green-700 transition">
                    Daftar
                </button>
            </div>
        </form>
    </div>
@endsection
