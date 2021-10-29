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

        <p class="fw-bold display-6">Add a Vaccination center</p>
        <a href="{{ route('vaccination-centers.index') }}" class="btn btn-secondary rounded-full">
            <i class="bi bi-arrow-left"></i> Go back</a>

        <div class="col-md-6 mx-auto mt-3 bg-white rounded-xl shadow-md px-4 pt-4 pb-2">
            <form action="{{ route('vaccination-centers.store') }}" method="POST">
                @csrf

                <div class=" row mb-3">
                    <label for="moh_division_id" class="col-md-4 col-form-label fw-bold">Moh Area</label>
                    <div class="col-md-8">
                        <select class="form-select form-select-sm rounded-full" name="moh_division_id"
                            id="moh_division_id" required>
                            <option value="{{ null }}">-- Select One --</option>
                            @foreach ($moh_areas as $moh_area)
                            <option value="{{ $moh_area->id }}">{{ $moh_area->moh_division }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class=" row mb-3">
                    <label for="grama_niladhari_division_id" class="col-md-4 col-form-label fw-bold">Grama Niladhari
                        Division</label>
                    <div class="col-md-8">
                        <select class="form-select form-select-sm rounded-full" name="grama_niladhari_division_id"
                            id="grama_niladhari_division_id" required>
                            <option value="{{ null }}">-- Select One --</option>
                            @foreach ($grama_niladhari_areas as $grama_niladhari_area)
                            <option value="{{ $grama_niladhari_area->id }}">{{
                                $grama_niladhari_area->grama_niladhari_division }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="center_name" class="col-md-4 col-form-label fw-bold">Vaccine Center name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm rounded-full" name="center_name"
                            id="center_name" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="head_person" class="col-md-4 col-form-label fw-bold">Responsible person</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm rounded-full" name="head_person"
                            id="head_person" required>
                    </div>
                </div>


                <div class="clearfix mb-3">
                    <button type="submit" class="btn btn-sm rounded-full btn-success float-end"><i
                            class="bi bi-plus-circle"></i> Create Vaccination center</button>
                </div>
                @include('components.error_message')
            </form>
        </div>


    </div>


</div>
@endsection
