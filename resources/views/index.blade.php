<!-- resources/views/dashboard.blade.php -->
@extends('bagian.main')

@section('content')
    <x-dynamic-content>
        @switch($aktivitas)
            @case('dashboard')
                @include('pages.dashboard')
            @break
            @case('pelanggan')
                @include('pages.pelanggan')
            @break
            @case('produk')
            @include('pages.produk')
        @break
            @default
                @include('pages.dashboard')
        @endswitch
    </x-dynamic-content>
@endsection
