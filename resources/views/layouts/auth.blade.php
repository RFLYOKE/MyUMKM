<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="w-full h-screen hidden md:flex items-center justify-center">
        <h1 class="text-2xl font-semibold">Aplikasi hanya tersedia dibawah 768px</h1>
    </div>
    <div class="md:hidden w-full min-h-screen flex items-center justify-center bg-gradient-to-b from-[#A8D5BA] to-[#FFD9B3]">
        @yield('content')
    </div>
</body>
</html>