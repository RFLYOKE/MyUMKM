<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Settings | MyUMKM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-[#A8D5BA] to-[#FFD9B3]">
    <div class="min-h-screen p-6">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('icon/icon.png') }}" alt="" onclick="history.back()">
                    <h1 class="text-xl font-bold">Akun saya</h1>
                </div>
                <a href="" class="text-sm font-medium text-black">Edit</a>
            </div>

            <!-- Profile -->
            <div class="flex items-center space-x-4 mb-6">
                <img src="{{ asset('icon/profileIcon.png') }}" alt="" class="w-16 h-16">
                <div>
                    <p class="text-lg font-semibold">Rawalo</p>
                    <p class="text-gray-500 text-sm">08 xxx xxx xxx</p>
                </div>
            </div>

            <!-- Menu List -->
            <div class="rounded-lg border border-gray-700 p-4 flex flex-col gap-y-6">
                <div class="flex items-center flex gap-x-3">
                    <img src="{{ asset('icon/iconAlamat.png') }}" alt="">
                    <span class="font-semibold">Alamat saya</span>
                </div>
                <div class="flex items-center flex gap-x-3">
                   <img src="{{ asset('icon/notifMenu.png') }}" alt="" class="w-6">
                    <span class="font-semibold">Notifikasi</span>
                </div>
                <div class="flex items-center flex gap-x-3">
                    <img src="{{ asset('icon/orderStatus.png') }}" alt="">
                    <span class="font-semibold">Status Pesanan</span>
                </div>
                <div class="flex items-center flex gap-x-3">
                    <img src="{{ asset('icon/out.png') }}" alt="">
                    <span class="font-semibold text-red-600">Keluar</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
