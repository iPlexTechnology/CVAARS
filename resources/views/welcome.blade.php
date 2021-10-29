@extends('layouts.app')

@section('bg_color', '#FCA121')

@section('navbar')
@include('layouts.navbar-main')
@endsection

@push('styles')
<style>
    div::-webkit-scrollbar {
        display: none;
    }
</style>
@endpush

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
                    {{ __('The nation’s top health care organizations agree COVID 19 vaccines are safe and effective')
                    }}
                </p>

                <p class="font-bold fs-3">{{ __('Still not vaccinated?') }}</p>

                <a href="{{ route('register_for_vaccination.create', app()->getLocale()) }}"
                    class="btn btn-lg rounded-full btn-dark">{{ __('Register now') }}</a>
            </div>
        </div>
        @endif
        {{-- <div class="col-md-2"></div> --}}
        @livewire('notices')
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
