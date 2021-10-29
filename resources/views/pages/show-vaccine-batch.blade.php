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

        <p class="fw-bold display-6">{{ $vaccineBatch->vaccine_type }} {{ $vaccineBatch->batch_no }}</p>
        <a href="{{ route('vaccine-batches.index') }}" class="btn btn-secondary rounded-full">
            <i class="bi bi-arrow-left"></i> Go back</a>

        <table class="table table-auto mt-5">
            <thead>
                <tr>
                    <th>Vaccination Center</th>
                    <th>Allocated Quantity</th>
                    <th>Remaining Quantity</th>
                    <th>Allocated On</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allocations as $allocation)
                <tr>
                    <td>{{ $allocation->getVaccinationCenter->center_name }}</td>
                    <td>{{ $allocation->allocated_quantity }}</td>
                    <td>{{ $allocation->remaining_quantity }}</td>
                    <td>{{ $allocation->created_at->toDateString() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>


</div>
@endsection
