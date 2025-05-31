<div class="bg-[#4A7744] p-4 flex flex-wrap items-center justify-between gap-2">
    <div class="flex items-center gap-x-3">
        <img src="{{ asset('icon/profileIcon.png') }}" alt="">
        <div class="text-left">
            <p class="text-white">{{ auth()->user()->name }}</p>
            <p class="text-white text-sm">{{ auth()->user()->no_hp ?? '-' }}</p>
        </div>
    </div>
    <div>
        <img src="{{ asset('icon/setting.png') }}" alt="" onclick="location.href='/profile/settings'" class="cursor-pointer">
    </div>
</div>
