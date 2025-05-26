<div class="mt-4 mb-20 px-3">
    @if (!Request::is('dashboard/search'))
        <nav class="my-2">
            <ul class="flex gap-x-4 *:font-semibold">
                <li>Untuk Anda</li>
                <li>Promo 12.12</li>
            </ul>
        </nav>
    @endif

    <div id="foryou" class="grid grid-cols-2 gap-x-6 gap-y-4">
        @for ($i = 0; $i < 4; $i++)
            <div class="px-2 pt-3 pb-2 bg-[#A9CDA8]">
                <div class="bg-white p-4 flex justify-center">
                    <img src="{{ asset('img/kaos.png') }}" alt="" class="w-20 h-20">
                </div>
                <div>
                    <h4 class="text-md font-semibold">
                        Baju Hitam Polos
                    </h4>
                    <p class="text-md font-semibold">
                        Rp 169.000
                    </p>
                </div>
                <div class="grid grid-cols-2">
                    <div class="text-xs text-gray-600 mt-1">100+ Terjual</div>
                    <div class="text-xs text-gray-600 mt-1">📍Purwokerto</div>
                </div>
            </div>
        @endfor
    </div>
</div>
