<div class="bg-[#A9CDA8] rounded-xl p-4 shadow-sm">
    <div class="flex items-center justify-between mb-2">
        <div>
            <p class="text-sm font-semibold text-black">Belanja</p>
            <p class="text-xs text-gray-700">{{ \Carbon\Carbon::parse($pesanan->created_at)->translatedFormat('d M Y') }}</p>
        </div>
        <div class="flex items-center space-x-2">
            <span class="bg-[#c2ab91] text-xs px-2 py-1 rounded-md font-semibold text-white">
                {{ ucfirst($pesanan->status_pesanan) }}
            </span>
            <img src="/icon/3dot.png" alt="More" class="w-2 h-4" />
        </div>
    </div>

    <div class="flex flex-col items-start">
    @foreach ($pesanan->pesananItems as $item)
        @php
            $produk = $item->produk;
            $gambar = $produk->gambarUtama->gambar ?? null;
        @endphp

        <div class="flex items-center gap-x-4 mb-2">
            <img src="{{ asset('storage/' . ($item->produk->gambar_utama ?? 'img/default.png')) }}"
                alt="{{ $item->produk->nama }}"
                class="w-16 h-16 object-cover rounded" />

                        
            <div class="flex-1">
                <p class="text-sm font-semibold text-black">{{ $produk->nama }}</p>
                <p class="text-xs text-gray-700">{{ $item->jumlah_beli }} Barang</p>
            </div>
        </div>
    @endforeach


        @php
            $firstItem = $pesanan->pesananItems->first();
        @endphp

        <div class="flex justify-between w-full">
            <div>
                <p class="text-xs mt-2 text-gray-700">Total Belanja</p>
                <p class="text-sm font-bold text-black">Rp {{ number_format($pesanan->payment->total_pembayaran, 0, ',', '.') }}</p>
            </div>

            <div>
                @if ($pesanan->payment && $pesanan->payment->status_bayar === 'belum_bayar')
                    <a href="{{ route('payment.show', $pesanan->payment->id) }}"
                        class="bg-[#e53935] hover:bg-[#c62828] text-white text-sm px-4 py-1 rounded-md">
                        Bayar Sekarang
                    </a>
                @elseif($firstItem)
                    <a href="{{ route('produk.detail', $firstItem->produk->id) }}"
                        class="bg-[#ea8e49] hover:bg-[#d87c38] text-white text-sm px-4 py-1 rounded-md">
                        Beli Lagi
                    </a>
                @endif
            </div>
        </div>

    </div>
</div>
