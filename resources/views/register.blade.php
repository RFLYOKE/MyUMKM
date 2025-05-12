@extends('layouts.auth')

@section('title', 'Login | MyUMKM')

@section('content')
    <div class="flex items-center justify-center w-full h-screen">
        <form action="#" method="POST">
            @csrf
            <div class="w-full border border-green-800 rounded-sm">
                <input class=" pl-3 pr-10 py-3" type="text" placeholder="Email atau Nomer Ponsel" required>
            </div>
            <div class="border border-green-800 rounded-sm mt-6">
                <input class="pl-3 pr-10 py-3" type="text" placeholder="Nama Pengguna" required>
            </div>
            <div class="border border-green-800 rounded-sm mt-6">
                <input class="pl-3 pr-10 py-3" type="password" placeholder="Kata sandi" required>
            </div>
            <div class="border border-green-800 rounded-sm mt-6">
                <input class="pl-3 pr-10 py-3" type="password" placeholder="Ketik ulang kata sandi" required>
            </div>
            <div class="flex justify-end">
                <button class="text-[#4A7744] text-sm">bantuan</button>
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
