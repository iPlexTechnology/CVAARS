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

        <p class="fw-bold display-6">Vaccine Types</p>

        <a href="{{ route('vaccine-types.create') }}" class="btn btn-success rounded-full"><i
                class="bi bi-plus-circle"></i> Add a
            Vaccine Type</a>

        <div class="mt-3">
            @include('components.error_message')
        </div>

        <div class="mt-3">
            <table class="table table-auto">
                <thead>
                    <tr>
                        <th>Name of the Vaccine</th>
                        <th>Manufactured country</th>
                        <th>Technology</th>
                        <th>Next dose duration</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vaccines as $vaccine)
                    <tr>
                        <td>{{ $vaccine->name }}</td>
                        <td>{{ $vaccine->manufactured_country }}</td>
                        <td>{{ $vaccine->technology }}</td>
                        <td>
                            @if ($vaccine->next_dose_duration_in_weeks)
                            {{ $vaccine->next_dose_duration_in_weeks }} Weeks
                            @else
                            (Only one dose)
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('vaccine-types.destroy', $vaccine->id) }}" method="POST">
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
