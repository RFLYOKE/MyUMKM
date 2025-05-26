<div class="bg-[#4A7744] p-4 flex flex-wrap items-center justify-between gap-2">
    <div class="flex items-center gap-x-6">
        <button>
            <img src="{{ asset('icon/arrowback.png') }}" alt="" onclick="history.back()">
        </button>
        <p class="text-white">@yield('page')</p>
    </div>
    <div>
        <img src="{{ asset('icon/setting.png') }}" alt="" onclick="location.href='/profile/settings'">
    </div>
</div>
