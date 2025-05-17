@extends('layouts.main')

@section('title', 'Dashboard | MyUMKM')

@section('header')
    @include('components.header.notificationHeader')
    <div class="p-6 flex flex-col gap-y-4">
        @for ($i = 0; $i < 6; $i++)
            <div class="bg-[#E27D31] px-3 py-2 rounded-xl w-3/4 flex items-center gap-x-4">
                <img src="{{ asset('icon/promo.png') }}" alt="">
                <div class="text-lg">
                    <p>Min. Belanja RP20</p>
                    <p>Promo hari ini! </p>
                </div>
            </div>
        @endfor
    </div>
@endsection
