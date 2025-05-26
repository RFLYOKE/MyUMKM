@extends('layouts.main')

@section('title', 'Search | MyUMKM')

@section('header')
    @include('components.header.search-header')
@endsection

@section('content')
    @include('components.products')
@endsection