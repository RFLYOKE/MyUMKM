<div class="bg-[#A9CDA8] rounded-md px-4 py-2 mt-2">
    <!-- Header Flash Sale -->
    <div class="flex items-center justify-between mb-2">
        <span class="text-lg font-bold">Flash Sale</span>
        <span id="countdown" class="bg-orange-400 text-white px-3 py-1 rounded font-bold">1:44:03</span>
    </div>

    <!-- Daftar Produk -->
    <div class="grid grid-cols-4 gap-2">
        @foreach ($produkFlashSale as $produk)
            <a href="{{ route('produk.detail', $produk->id) }}">
                <div class="border rounded-md shadow p-2 bg-white">
                    {{-- Gambar Utama Produk --}}
                    @php
                        $gambar = $produk->gambar_utama ?? 'img/default.png';
                    @endphp
                    <img src="{{ asset('storage/' . $gambar) }}" alt="{{ $produk->nama }}" class="w-full h-14 object-contain mb-2" />

                    {{-- Harga --}}
                    <div class="text-sm font-bold">Rp{{ number_format($produk->harga, 0, ',', '.') }}</div>
                    <div class="text-xs line-through text-gray-500">Rp{{ number_format($produk->harga * 1.3, 0, ',', '.') }}</div>
                </div>
            </a>
        @endforeach
    </div>
</div>

{{-- Info Produk Tambahan --}}
<div class="px-4 grid grid-cols-4 gap-4">
    @foreach ($produkFlashSale as $produk)
        <div class="text-xs text-gray-600 mt-1">{{ rand(100, 300) }}+ Terjual</div>
    @endforeach
</div>


<script>
    // Total detik (1 jam 44 menit 3 detik = 6243 detik)
    let totalSeconds = 624300;

    const countdownEl = document.getElementById("countdown");

    function updateCountdown() {
      const hours = Math.floor(totalSeconds / 3600);
      const minutes = Math.floor((totalSeconds % 3600) / 60);
      const seconds = totalSeconds % 60;

      // Format ke HH:MM:SS
      countdownEl.textContent = 
        `${String(hours).padStart(1, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

      if (totalSeconds > 0) {
        totalSeconds--;
      }
    }

    // Jalankan pertama kali dan setiap 1 detik
    updateCountdown();
    setInterval(updateCountdown, 1000);
  </script>

