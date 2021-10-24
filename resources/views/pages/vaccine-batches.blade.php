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

        <p class="fw-bold display-6">Vaccine Batches</p>

        <a href="{{ route('vaccine-batches.create') }}" class="btn btn-success rounded-full"><i
                class="bi bi-plus-circle"></i> Add a
            Vaccine Batch</a>

        <div class="mt-3">
            @include('components.error_message')
        </div>

        <div class="mt-3">
            <table class="table table-auto">
                <thead>
                    <tr>
                        <th>Batch No</th>
                        <th>Vaccine Type</th>
                        <th>MFD. Date</th>
                        <th>EXP. Date</th>
                        <th>Initial Qty.</th>
                        <th>Remaining Qty.</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vaccine_batches as $vaccine_batch)
                    <tr>
                        <td>{{ $vaccine_batch->batch_no }}</td>
                        <td>{{ $vaccine_batch->vaccine_type }}</td>
                        <td>{{ $vaccine_batch->manufactured_date }}</td>
                        <td>{{ $vaccine_batch->expiration_date }}</td>
                        <td>{{ $vaccine_batch->initial_quantity }}</td>
                        <td>{{ $vaccine_batch->current_quantity }}</td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('vaccine-batches.destroy', $vaccine_batch->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>


</div>
@endsection
