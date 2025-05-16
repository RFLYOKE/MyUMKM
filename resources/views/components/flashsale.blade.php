<div class="bg-[#A9CDA8] rounded-md px-4 py-2 mt-2">
    <!-- Header Flash Sale -->
    <div class="flex items-center justify-between mb-4">
        <span class="text-lg font-bold">Flash Sale</span>
        <span id="countdown" class="bg-orange-400 text-white px-3 py-1 rounded font-bold">1:44:03</span>
    </div>

    <!-- Daftar Produk -->
    <div class="grid grid-cols-4 gap-4">
        <div class="border rounded-md shadow p-2 bg-white">
            <img src="img/kaos.png" alt="Kaos" class="w-full h-14 object-contain mb-2" />
            <div class="text-sm font-bold">Rp169.000</div>
            <div class="text-xs line-through text-gray-500">Rp210.000</div>
        </div>

        <div class="border rounded-md shadow p-2 bg-white">
            <img src="img/kaos.png" alt="Sate" class="w-full h-14 object-contain mb-2" />
            <div class="text-sm font-bold">Rp10.000</div>
            <div class="text-xs line-through text-gray-500">Rp15.000</div>
        </div>

        <div class="border rounded-md shadow p-2 bg-white">
            <img src="img/kaos.png" alt="Jeans" class="w-full h-14 object-contain mb-2" />
            <div class="text-sm font-bold">Rp100.000</div>
            <div class="text-xs line-through text-gray-500">Rp255.000</div>
        </div>

        <div class="border rounded-md shadow p-2 bg-white">
            <img src="img/kaos.png" alt="Kemeja" class="w-full h-14 object-contain mb-2" />
            <div class="text-sm font-bold">Rp140.500</div>
            <div class="text-xs line-through text-gray-500">Rp200.000</div>
        </div>
    </div>
</div>
<div class="px-4 grid grid-cols-4 gap-4">
    <div class="text-xs text-gray-600 mt-1">100+ Terjual</div>
    <div class="text-xs text-gray-600 mt-1">📍Purwokerto</div>
    <div class="text-xs text-gray-600 mt-1">100+ Terjual</div>
    <div class="text-xs text-gray-600 mt-1">📍Purwokerto</div>
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

