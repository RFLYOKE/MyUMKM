@extends('layouts.main')

@section('title', 'Payment | MyUMKM')

@section('header')
    @section('page', 'Payment')
    @include('components.header.search-header')
@endsection

@section('content')
    <div class="px-4 py-6 space-y-4 text-sm">
        <div class="border rounded-xl p-4 space-y-4 shadow-md">

            {{-- Bagian Atas: Batas Waktu --}}
            <div class="flex items-center justify-between border-b pb-3">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('icon/time-icon.png') }}" class="w-10 h-10" alt="">
                    <div>
                        <p class="font-semibold">Bayar sebelum</p>
                        <p class="text-xs text-gray-700">
                            {{ \Carbon\Carbon::parse($payment->created_at)->addHours(24)->format('d M Y, H:i') }} WIB
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2 bg-[#FFE8C6] text-[#DA7D00] px-3 py-1 rounded-md text-sm font-medium">
                    <img src="{{ asset('icon/time-icon.png') }}" class="w-4 h-4" alt="Time">
                    <span id="countdown">24:00:00</span>
                </div>
            </div>

            {{-- Kode Pembayaran --}}
            <div class="flex items-center justify-between">
                <div class="text-sm">
                    <p class="font-medium">Kode Pembayaran</p>
                    <p class="font-semibold mt-1">1 123 456 78</p>
                </div>
                <img src="{{ asset('icon/' . strtolower(str_replace('_', '-', $payment->pesanan->metode_pembayaran)) . '.png') }}"
                    class="w-14" alt="{{ $payment->pesanan->metode_pembayaran }}">
            </div>


            {{-- Total Tagihan --}}
            <div class="flex items-center justify-between">
                <div class="text-sm">
                    <p class="font-medium">Total Tagihan</p>
                    <p class="text-lg font-semibold mt-1">Rp{{ number_format($payment->total_pembayaran, 0, ',', '.') }}</p>
                </div>
                <a href="#" class="text-sm font-semibold text-black">Lihat Detail</a>
            </div>

            {{-- Informasi Tambahan --}}
            <div class="border-t pt-3 text-gray-500 text-xs space-y-1">
                <p>> Pembayaran hanya bisa dilakukan dari E-wallet yang kamu pilih</p>
                <p>> Transaksi kamu baru akan diteruskan ke penjual setelah pembayaran berhasil diverifikasi.</p>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex items-center justify-between pt-2">
                <button class="border border-black px-4 py-2 rounded-lg font-medium">Lihat Cara Bayar</button>
                <button class="border border-black px-4 py-2 rounded-lg font-medium">Cek Status Bayar</button>
            </div>
        </div>

        {{-- Tombol Bayar Sekarang --}}
        <div class="mt-6">
            <a href="{{ route('payment.confirm-form', $payment->pesanan_id) }}">
                <button class="bg-[#D48042] text-white text-center w-full py-3 rounded-xl font-semibold text-base">
                    Bayar Sekarang
                </button>
            </a>
        </div>
    </div>

    <script>
        const countdownElement = document.getElementById('countdown');
        const countdownDuration = 24 * 60 * 60 * 1000;
        const endTime = new Date("{{ $payment->created_at->addHours(24)->format('Y-m-d H:i:s') }}").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = endTime - now;

            if (distance <= 0) {
                countdownElement.textContent = "00:00:00";
                clearInterval(timer);
                return;
            }

            const hours = String(Math.floor((distance / (1000 * 60 * 60)) % 24)).padStart(2, '0');
            const minutes = String(Math.floor((distance / (1000 * 60)) % 60)).padStart(2, '0');
            const seconds = String(Math.floor((distance / 1000) % 60)).padStart(2, '0');

            countdownElement.textContent = `${hours}:${minutes}:${seconds}`;
        }

        const timer = setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
@endsection
