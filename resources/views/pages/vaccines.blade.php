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

        @canany(['ad', 'hm'])
        <a href="{{ route('vaccine-types.create') }}" class="btn btn-success rounded-full"><i
                class="bi bi-plus-circle"></i> Add a
            Vaccine Type</a>
        @endcan

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
                            <a href="{{ route('vaccine-types.show', $vaccine->id) }}" class="btn btn-success btn-sm"><i
                                    class="bi bi-eye"></i> View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>


</div>
@endsection
