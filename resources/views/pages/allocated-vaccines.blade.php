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

    <div class="mt-5">

        <p class="fw-bold display-6">Vaccine Allocations</p>

        @canany(['ad', 'hm'])
        <a href="{{ route('vaccine-allocations.create') }}" class="btn btn-success rounded-full"> Allocate
            Vaccines</a>
        @endcan

        <div class="mt-3">
            @include('components.error_message')
        </div>

        <div class="mt-3">
            {{ $vaccine_allocations->links() }}
            <table class="table table-auto">
                <thead>
                    <tr>
                        <th>Vaccine Type</th>
                        <th>Batch No</th>
                        <th>Vaccination Center</th>
                        <th>Allocated Qty.</th>
                        <th>Remaining Qty.</th>
                        <th>Allocated On</th>
                        {{-- <th></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vaccine_allocations as $vaccine_allocation)
                    <tr>
                        <td>{{ $vaccine_allocation->getVaccineBatch->vaccine_type }}</td>
                        <td>{{ $vaccine_allocation->getVaccineBatch->batch_no }}</td>
                        <td>{{ $vaccine_allocation->getVaccinationCenter->center_name }}</td>
                        <td>{{ $vaccine_allocation->allocated_quantity }}</td>
                        <td>{{ $vaccine_allocation->remaining_quantity }}</td>
                        <td>{{ $vaccine_allocation->created_at->toDateString() }}</td>
                        {{-- <td>
                            <a href="#" class="btn btn-success btn-sm"><i class="bi bi-eye"></i> View</a>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>


</div>
@endsection
