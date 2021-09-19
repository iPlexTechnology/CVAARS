@extends('layouts.app')

@section('bg_color', '#FCA121')

@section('navbar')
@include('layouts.navbar-main')
@endsection


@section('content')
<div class="container">

    <div class="row w-100 mt-5">
        @if($registration_form_auth ?? false)
        @livewire('register-for-vaccine')
        @else
        <div class="col-md-8">
            <center>
                <img src="{{ asset('img/logo.png') }}" alt="CVAARS logo" class="pt-5" style="width: 70%">
            </center>

            <div class="text-center mx-auto mt-4">

                <p class="fs-5 fw-500">
                    {{ __('The nation’s top health care organizations agree COVID 19 vaccines are safe and effective') }}
                </p>

                <p class="font-bold fs-3">{{ __('Still not vaccinated?') }}</p>

                <a href="{{ route('register_for_vaccination.create', app()->getLocale()) }}"
                    class="btn btn-lg rounded-full btn-dark">{{ __('Register now') }}</a>
            </div>
        </div>
        @endif
        {{-- <div class="col-md-2"></div> --}}
        <div class="col-md-4 mt-5">
            <div class="bg-white rounded-2xl p-3" style="width: auto; height: 27rem">
                <p class="text-pink-600 fs-5 font-bold">{{ __('Current Vaccination updates') }}</p>
            </div>
            <div class="mt-2 mb-1 clearfix">
                <a href="#"
                    class="btn btn-sm btn-outline-dark rounded-full float-end">{{ __('See full vaccination plan') }}</a>
            </div>
            <p class="text-dark font-bold text-right mb-0">{{ __('total vaccinated count') }}</p>
            <p class="text-red-600 fs-1 font-bold text-right">10,234,132</p>
        </div>
    </div>


</div>

{{-- Footer start --}}
{{-- <nav class="navbar navbar-expand-lg navbar-dark fixed-bottom">
    <div class="container">
        <div class="row w-100">
            <div class="col-lg-2">
                <span class="navbar-text">
                    <i class="bi bi-telephone-fill"></i> (011) 123-4567/ 89
                </span>
            </div>
            <div class="col-lg-2">
                <span class="navbar-text">
                    <i class="bi bi-envelope-fill"></i> info@cvaarsproject.lk
                </span>
            </div>
            <div class="col-lg-6">
                <span class="navbar-text">
                    <i class="bi bi-geo-alt-fill"></i> 385, Ven. Baddegama Wimalawansa Thero Mawatha, Colombo 10
                </span>
            </div>
            <div class="col-lg-2">
                <span class="navbar-text">
                    <a href="#"><i class="me-2 bi bi-facebook"></i></a>
                    <a href="#"><i class="mx-2 bi bi-linkedin"></i></a>
                    <a href="#"><i class="mx-2 bi bi-youtube"></i></a>
                    <a href="#"><i class="mx-2 bi bi-telegram"></i></a>
                    <a href="https://github.com/iPlexTechnology/CVAARS"><i class="mx-2 bi bi-github"></i></a>
                </span>
            </div>

        </div>
    </div>
</nav> --}}
{{-- Footer end --}}
@endsection
