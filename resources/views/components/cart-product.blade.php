 <div class="bg-[#A9CDA8] border border-black rounded-xl p-4 w-full max-w-md">
                <div class="flex items-center justify-between gap-3">
                    <!-- Kiri -->
                    <div class="flex items-start gap-3">
                        <img src="{{ asset('storage/' . $item->produk->produkGambars->first()->gambar ?? 'default.jpg') }}"
                            alt="{{ $item->produk->nama }}"
                            class="w-16 h-16 object-cover rounded">

                        <div>
                            <p class="text-base font-bold text-black">{{ $item->produk->nama }}</p>
                            <p class="text-sm text-black mt-1">Ukuran: {{ $item->ukuran }}</p>
                            <p class="text-sm font-bold text-black mt-1">
                                Rp {{ number_format($item->produk->harga * $item->jumlah_beli, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Kanan -->
                    <div class="flex flex-col items-center gap-2">
                        {{-- Tombol Favorit --}}
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21.364l-7.682-7.682a4.5 4.5 0 010-6.364z" />
                            </svg>
                        </button>

                        {{-- Tombol Hapus (X) --}}
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" title="Hapus item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black hover:text-red-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Kontrol Jumlah -->
                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center mt-3 border border-black rounded-md overflow-hidden w-fit">
                    @csrf @method('PUT')
                    <button type="submit" name="jumlah_beli" value="{{ $item->jumlah_beli - 1 }}" class="px-2 py-1 hover:bg-red-100">-</button>
                    <span class="px-2 text-black">{{ $item->jumlah_beli }}</span>
                    <button type="submit" name="jumlah_beli" value="{{ $item->jumlah_beli + 1 }}" class="px-2 py-1 hover:bg-green-100">+</button>
                </form>
            </div>