<div class="bg-[#A9CDA8] border border-black rounded-xl p-4 w-full max-w-md">
  <div class="flex items-center justify-between gap-3">
    <!-- Kiri: Checkbox + Gambar + Info -->
    <div class="flex items-start gap-3">
      <!-- Checkbox -->
      <input type="checkbox" class="mt-1 accent-black">

      <!-- Gambar Produk -->
      <img src="/img/kaos.png" alt="Baju Hitam Polos" class="w-16 h-16 object-cover rounded">

      <!-- Info Produk -->
      <div>
        <p class="text-base font-bold text-black">Baju Hitam Polos</p>
        <p class="text-sm font-bold text-black mt-1">Rp 169.000</p>
        <!-- Icon Love -->
        <button>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-5 h-5 mt-1 text-black" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21.364l-7.682-7.682a4.5 4.5 0 010-6.364z" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Kanan: Tombol Qty -->
    <div class="flex items-center border border-black rounded-md overflow-hidden">
      <!-- Hapus -->
      <button class="px-2 py-1 hover:bg-red-100">
        <img src="{{ asset('icon/trash.png') }}" alt="">
      </button>
      <!-- Jumlah -->
      <span class="px-2 text-black">1</span>
      <!-- Tambah -->
      <button class="px-2 py-1 hover:bg-green-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
      </button>
    </div>
  </div>
</div>