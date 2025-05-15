<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-[#A8D5BA] to-[#FFD9B3]">
    <!-- Hanya tampil di desktop -->
    <div class="w-full h-screen hidden md:flex items-center justify-center">
        <h1 class="text-2xl font-semibold">Aplikasi hanya tersedia dibawah 768px</h1>
    </div>

    <!-- Tampil hanya di mobile -->
    <div class="md:hidden flex flex-col min-h-screen">
        <!-- Optional header -->
        <div>@yield('header')</div>

        <!-- Konten tengah, fleksibel -->
        <div class="py-4">
            @yield('content')
        </div>

        <!-- Navbar bawah -->
        <nav class="{{ request()->is('/') ? 'hidden' : '' }} fixed bottom-0 left-0 right-0 bg-[#b4926a] h-20 flex justify-around items-center shadow-lg z-50 rounded-t-xl overflow-hidden">
            <ul class="flex justify-between items-center w-full px-8 pb-2 relative z-10">
        
                {{-- Home --}}
                <li class="relative">
                    @if (Request::is('dashboard'))
                        <div class="bg-[#FFD9B3] w-16 h-20 rounded-b-full rounded-t-xl flex items-center justify-center">
                            <div class="w-12 h-12 bg-[#b4926a] rounded-full flex items-center justify-center">
                                <img src="{{ asset('icon/homeMenu.png') }}" alt="Home" class="w-6 h-6" />
                            </div>
                        </div>
                    @else
                        <a href="/dashboard" class="flex items-center justify-center h-full">
                            <img src="{{ asset('icon/homeMenu.png') }}" alt="Home" class="w-6 h-6" />
                        </a>
                    @endif
                </li>
        
                {{-- Notifikasi --}}
                <li class="relative">
                    @if (Request::is('notification'))
                        <div class="bg-[#FFD9B3] w-16 h-20 rounded-b-full rounded-t-xl flex items-center justify-center">
                            <div class="w-12 h-12 bg-[#b4926a] rounded-full flex items-center justify-center">
                                <img src="{{ asset('icon/notifMenu.png') }}" alt="Notifikasi" class="w-6 h-6" />
                            </div>
                        </div>
                    @else
                        <a href="/notification" class="flex items-center justify-center h-full">
                            <img src="{{ asset('icon/notifMenu.png') }}" alt="Notifikasi" class="w-6 h-6" />
                        </a>
                    @endif
                </li>
        
                {{-- Transaksi --}}
                <li class="relative">
                    @if (Request::is('transaction'))
                        <div class="bg-[#FFD9B3] w-16 h-20 rounded-b-full rounded-t-xl flex items-center justify-center">
                            <div class="w-12 h-12 bg-[#b4926a] rounded-full flex items-center justify-center">
                                <img src="{{ asset('icon/transaksiMenu.png') }}" alt="Transaksi" class="w-6 h-6" />
                            </div>
                        </div>
                    @else
                        <a href="/transaction" class="flex items-center justify-center h-full">
                            <img src="{{ asset('icon/transaksiMenu.png') }}" alt="Transaksi" class="w-6 h-6" />
                        </a>
                    @endif
                </li>
        
                {{-- Profile --}}
                <li class="relative">
                    @if (Request::is('profile'))
                        <div class="bg-[#FFD9B3] w-16 h-20 rounded-b-full rounded-t-xl flex items-center justify-center">
                            <div class="w-12 h-12 bg-[#b4926a] rounded-full flex items-center justify-center">
                                <img src="{{ asset('icon/profileMenu.png') }}" alt="Profil" class="w-6 h-6" />
                            </div>
                        </div>
                    @else
                        <a href="/profile" class="flex items-center justify-center h-full">
                            <img src="{{ asset('icon/profileMenu.png') }}" alt="Profil" class="w-6 h-6" />
                        </a>
                    @endif
                </li>
        
            </ul>
        </nav>        
    </div>
</body>

</html>
