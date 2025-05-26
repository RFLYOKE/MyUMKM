@if (Request::is('cart/checkout/payment'))
    {{-- Search khusus halaman pembayaran --}}
    <div class="bg-[#4A7744] flex items-center justify-between p-4">
        <img src="{{ asset('icon/arrow-left-black.png') }}" alt="" onclick="history.back()">
        <div class="flex items-center border border-[#5a3d2e] rounded-lg px-3 w-3/4">
            <img src="/icon/searchIcon.png" alt="Search" class="w-5 h-5 mr-2" />
            <input type="text" placeholder="Cari disini"
                class="text-sm text-gray-700 placeholder-gray-700 bg-transparent border-none focus:outline-none py-2 w-full" />
        </div>
        <button class="text-lg font-semibold text-black ml-4">Cari</button>
    </div>
@else
    {{-- Search default --}}
    <div class="flex items-center gap-x-2 p-4">
        <img src="{{ asset('icon/arrow-left-black.png') }}" alt="" onclick="history.back()">
        <div class="flex items-center border border-[#5a3d2e] rounded-lg px-3 w-3/4">
            <img src="/icon/searchIcon.png" alt="Search" class="w-5 h-5 mr-2" />
            <input type="text" placeholder="Baju Hitam Polos"
                class="text-sm text-gray-700 placeholder-gray-700 bg-transparent border-none focus:outline-none py-2 w-full" />
            <button class="text-lg font-semibold text-black ml-4">Cari</button>
        </div>
    </div>
@endif
