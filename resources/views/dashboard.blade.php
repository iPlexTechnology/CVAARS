@extends('layouts.app')

@section('navbar')
@include('layouts.navbar')
@endsection

@push('styles')
<style>
    iframe {
        overflow: hidden;
    }
</style>
@endpush

@section('content')
<div class="container">

    <div class="row mt-4">

        <div class="col-md-3">

            @canany(['ad', 'hm', 'doc'])
            <div class="d-grid gap-2">
                <p class="h4 fw-bold">Vaccine Records</p>
                <a href="{{ route('vaccine-types.index') }}" class="btn btn-outline-dark rounded-pill ms-4">Vaccine
                    Types</a>
                <a href="{{ route('vaccine-batches.index') }}" class="btn btn-outline-dark rounded-pill ms-4">Vaccine
                    Batches</a>
                <a href="{{ route('vaccine-allocations.index') }}"
                    class="btn btn-outline-dark rounded-pill ms-4">Vaccine Allocations</a>
            </div>
            @endcan

            @canany(['ad', 'hm', 'doc'])
            <div class="d-grid gap-2 mt-4">
                <p class="h4 fw-bold">Vaccination Records</p>
                @canany(['ad', 'hm'])
                <a href="{{ route('vaccination-centers.index') }}"
                    class="btn btn-outline-dark rounded-pill ms-4">Vaccination Centers</a>
                @endcan
                @canany(['ad', 'doc'])
                <a href="{{ route('mark-vaccination-receiving.create') }}"
                    class="btn btn-outline-dark rounded-pill ms-4">Mark Vaccination</a>
                @endcan
            </div>
            @endcan

            @canany(['ad', 'gsn'])
            <div class="d-grid gap-2 mt-4 mb-5">
                <p class="h4 fw-bold">Residential Records</p>
                <a href="{{ route('residential-areas.index') }}" class="btn btn-outline-dark rounded-pill ms-4">Enter
                    people records</a>
            </div>
            @endcan

            @canany(['ad', 'hm'])
            <div class="d-grid gap-2 mt-4 mb-5">
                <p class="h4 fw-bold">User Management</p>
                <a href="{{ route('users.index') }}" class="btn btn-outline-dark rounded-pill ms-4">Add
                    Users</a>
            </div>
            @endcan

        </div>

        <div class="col-md-1"></div>

        <div class="col-md-8">
            <div class="px-4 py-3 bg-white rounded-2xl shadow-md">
                <div class="guide-description">
                    <iframe class="w-100" style="height: 430px"
                        src="https://app.powerbi.com/view?r=eyJrIjoiODY1MTliZjQtNTMzNi00MmRmLTg4NDMtM2U5YWZkMWMwNjNlIiwidCI6ImExNzJkODM2LWQ0YTUtNDBjZS1hNGFkLWJiY2FhMTAzOGY1NiIsImMiOjEwfQ%3D%3D"
                        title="Vaccination Statistics"></iframe>
                </div>
            </div>
        </div>

    </div>


</div>
@endsection
