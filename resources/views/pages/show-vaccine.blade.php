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

        <p class="fw-bold display-6">{{ $vaccineType->name }} Vaccine</p>
        <a href="{{ route('vaccine-types.index') }}" class="btn btn-secondary rounded-full">
            <i class="bi bi-arrow-left"></i> Go back</a>

        <table class="table table-auto mt-5">
            <tbody>
                <tr>
                    <th>Total received vaccine amount</th>
                    <th>{{ $total }}</th>
                </tr>
                <tr>
                    <th>Total distributed vaccine amount</th>
                    <th>{{ $remain }}</th>
                </tr>
                <tr>
                    <th>Total remaining vaccine amount</th>
                    <th>{{ $total - $remain }}</th>
                </tr>
            </tbody>
        </table>

    </div>


</div>
@endsection
