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

        <p class="fw-bold display-6">Add People's records</p>
        <a href="{{ route('residential-areas.index') }}" class="btn btn-secondary rounded-full">
            <i class="bi bi-arrow-left"></i> Go back</a>

        <div class="col-md-6 mx-auto mt-3 bg-white rounded-xl shadow-md px-4 pt-4 pb-2">
            <form action="{{ route('residential-areas.store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class=" row mb-3">
                    <label for="moh_division_id" class="col-md-4 col-form-label fw-bold">MOH Area</label>
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
                    <label for="grama_niladhari_divisions_id" class="col-md-4 col-form-label fw-bold">Grama Niladhari
                        divisions</label>
                    <div class="col-md-8">
                        <select class="form-select form-select-sm rounded-full" name="grama_niladhari_divisions_id"
                            id="grama_niladhari_divisions_id" required>
                            <option value="{{ null }}">-- Select One --</option>
                            @foreach ($grama_niladhari_divisions as $grama_niladhari_devision)
                            <option value="{{ $grama_niladhari_devision->id }}">{{
                                $grama_niladhari_devision->grama_niladhari_division }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nic_list" class="col-md-4 col-form-label fw-bold">People's record list</label>
                    <div class="col-md-8">
                        <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                            class="form-control form-control-sm rounded-full" name="nic_list" id="nic_list"
                            aria-describedby="filehelp" required>
                        <div id="filehelp" class="form-text text-sm">Download and use format given below. Upload a .xlsx
                            document.</div>
                    </div>
                </div>


                <div class="clearfix mb-3">
                    <a href="{{ asset('downloads/NIC list for CVAARS.xlsx') }}"
                        class="btn btn-sm rounded-full btn-secondary float-start" rel="noopener noreferrer">Download
                        the
                        templete</a>
                    <button type="submit" class="btn btn-sm rounded-full btn-success float-end"><i
                            class="bi bi-plus-circle"></i> Upload record list</button>
                </div>
                @include('components.error_message')
            </form>
        </div>


    </div>


</div>
@endsection
