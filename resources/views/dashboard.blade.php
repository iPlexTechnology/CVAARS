@extends('layouts.app')

@section('navbar')
@include('layouts.navbar')
@endsection

{{-- @push('styles')
<style>
    .main {
        display: flex;
        height: 85vh;
        width: 100%;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush --}}

@section('content')
<div class="container">

    <div class="row mt-5">

        <div class="col-md-3">

            <div class="d-grid gap-2">
                <p class="h4 fw-bold">Vaccine Records</p>
                <a href="{{ route('vaccine-types.index') }}" class="btn btn-outline-dark rounded-pill ms-4">Vaccine
                    Types</a>
                <a href="{{ route('vaccine-batches.index') }}" class="btn btn-outline-dark rounded-pill ms-4">Vaccine
                    Batches</a>
                <a href="#" class="btn btn-outline-dark rounded-pill ms-4">Vaccine Allocations</a>
            </div>

            <div class="d-grid gap-2 mt-5">
                <p class="h4 fw-bold">Vaccination Records</p>
                <a href="#" class="btn btn-outline-dark rounded-pill ms-4">Mark Vaccination</a>
            </div>

            <div class="d-grid gap-2 mt-5 mb-5">
                <p class="h4 fw-bold">Residential Records</p>
                <a href="#" class="btn btn-outline-dark rounded-pill ms-4">Enter people records</a>
            </div>

        </div>

        <div class="col-md-2"></div>

        <div class="col-md-7">
            [Graphs]
        </div>

    </div>


</div>
@endsection
