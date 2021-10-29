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

        <p class="fw-bold display-6">Add a Vaccine Batch</p>
        <a href="{{ route('vaccine-batches.index') }}" class="btn btn-secondary rounded-full">
            <i class="bi bi-arrow-left"></i> Go back</a>

        <div class="col-md-6 mx-auto mt-3 bg-white rounded-xl shadow-md px-4 pt-4 pb-2">
            <form action="{{ route('vaccine-batches.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="batch_no" class="col-md-4 col-form-label fw-bold">Batch No</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm rounded-full" name="batch_no"
                            id="batch_no" value="{{ old('batch_no') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="vaccine_id" class="col-md-4 col-form-label fw-bold">Vaccine Type</label>
                    <div class="col-md-8">
                        <select class="form-select form-select-sm rounded-full" name="vaccine_id" id="vaccine_id"
                            required>
                            <option value="{{ null }}">-- Select One --</option>
                            @foreach ($vaccine_types as $vaccine_type)
                            <option value="{{ $vaccine_type->id }}">{{ $vaccine_type->name }} ({{
                                $vaccine_type->manufactured_country }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="manufactured_date" class="col-md-4 col-form-label fw-bold">Manufactured Date</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control form-control-sm rounded-full" name="manufactured_date"
                            id="manufactured_date" value="{{ old('manufactured_date') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="expiration_date" class="col-md-4 col-form-label fw-bold">Expiration Date</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control form-control-sm rounded-full" name="expiration_date"
                            id="expiration_date" value="{{ old('expiration_date') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="quantity" class="col-md-4 col-form-label fw-bold">Recieved Quantity</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control form-control-sm rounded-full" name="quantity"
                            id="quantity" value="{{ old('quantity') }}" required>
                    </div>
                </div>

                <div class="clearfix mb-3">
                    <button type="submit" class="btn btn-sm rounded-full btn-success float-end"><i
                            class="bi bi-plus-circle"></i> Add
                        the Vaccine Batch</button>
                </div>
                @include('components.error_message')
            </form>
        </div>


    </div>


</div>
@endsection
