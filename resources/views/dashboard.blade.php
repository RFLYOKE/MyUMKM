@extends('layouts.main')

@section('title', 'Dashboard | MyUMKM')

@section('header')
    @include('components.dashboardHeader')
@endsection

@section('content')
    @include('components.corousel')    
@endsection