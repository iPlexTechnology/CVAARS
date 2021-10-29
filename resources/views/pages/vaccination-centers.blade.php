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

        <p class="fw-bold display-6">Vaccination Centers</p>

        <a href="{{ route('vaccination-centers.create') }}" class="btn btn-success rounded-full"> New Vaccination
            center</a>

        <a href="{{ route('vaccine-allocations.create') }}" class="btn btn-primary rounded-full"> Allocate Vaccines</a>

        <div class="mt-3">
            @include('components.error_message')
        </div>

        <div class="mt-3">
            {{ $centers->links() }}
            <table class="table table-auto">
                <thead>
                    <tr>
                        <th>Center Name</th>
                        <th>MOH Division</th>
                        <th>Grama Niladhari Division</th>
                        <th>Head Person</th>
                        <th>Available Vaccine Qty.</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($centers as $center)
                    <tr>
                        <td>{{ $center->center_name }}</td>
                        <td>{{ $center->getMOHArea->moh_division }}</td>
                        <td>{{ $center->getGramaNiladhariArea->grama_niladhari_division }}</td>
                        <td>{{ $center->head_person }}</td>
                        <td>
                            @php
                            $total = 0;
                            foreach ($center->getRemainingVaccine as $allocate) {
                            $total += $allocate->remaining_quantity;
                            }
                            echo $total;
                            @endphp
                        </td>
                        <td>
                            <a href="{{ route('vaccination-centers.show', $center->id) }}"
                                class="btn btn-success btn-sm"><i class="bi bi-eye"></i> View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>


</div>
@endsection
