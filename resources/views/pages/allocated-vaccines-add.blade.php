@extends('layouts.app')

@section('navbar')
@include('layouts.navbar')
@endsection

@push('styles')
<style>
    .main {
        display: flex;
        /* height: 85vh; */
        width: 100%;
        /* align-items: center; */
        justify-content: center;
    }
</style>
@endpush

@section('content')
<div class="container">

    <div class="mt-5">

        <p class="fw-bold display-6">Allocate Vaccines</p>
        <a href="{{ route('vaccine-allocations.index') }}" class="btn btn-secondary rounded-full">
            <i class="bi bi-arrow-left"></i> Go back</a>

        <div class="col-md-6 mx-auto mt-3 bg-white rounded-xl shadow-md px-4 pt-4 pb-2">
            <form action="{{ route('vaccine-allocations.store') }}" method="POST">
                @csrf

                @livewire('vaccine-allocation-form')


                <div class="clearfix mb-3">
                    <button type="submit" class="btn btn-sm rounded-full btn-success float-end"><i
                            class="bi bi-plus-circle"></i> Allocate Vaccines</button>
                </div>
                @include('components.error_message')
            </form>
        </div>


    </div>


</div>
@endsection
