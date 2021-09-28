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
    {{-- <div class="row justify-content-center"> --}}
    <div class="col-md-12">
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card border-dark bg-transparent mb-3 mx-auto" style="width: 20rem; height:30rem">
                    <div class="card-header">Vaccine Records</div>
                    <div class="card-body text-dark pb-0">
                        <ul style="list-style-type: none;">
                            <li><a class="btn btn-sm btn-success rounded-full mb-2" href="#">Vaccine Types</a></li>
                            <li><a class="btn btn-sm btn-success rounded-full mb-2" href="#">Vaccine Batches</a></li>
                            <li><a class="btn btn-sm btn-success rounded-full mb-2" href="#">Vaccine Allocations</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-dark bg-transparent mb-3 mx-auto" style="width: 20rem; height:30rem">
                    <div class="card-header">Vaccine Records</div>
                    <div class="card-body text-dark pb-0">
                        <ul style="list-style-type: none;">
                            <li><a class="btn btn-sm btn-success rounded-full mb-2" href="#">Vaccine Types</a></li>
                            <li><a class="btn btn-sm btn-success rounded-full mb-2" href="#">Vaccine Batches</a></li>
                            <li><a class="btn btn-sm btn-success rounded-full mb-2" href="#">Vaccine Allocations</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-dark bg-transparent mb-3 mx-auto" style="width: 20rem; height:30rem">
                    <div class="card-header">Vaccine Records</div>
                    <div class="card-body text-dark pb-0">
                        <ul style="list-style-type: none;">
                            <li><a class="btn btn-sm btn-success rounded-full mb-2" href="#">Vaccine Types</a></li>
                            <li><a class="btn btn-sm btn-success rounded-full mb-2" href="#">Vaccine Batches</a></li>
                            <li><a class="btn btn-sm btn-success rounded-full mb-2" href="#">Vaccine Allocations</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- <div class="d-flex flex-row flex-wrap">


            <div class="card border-dark bg-transparent mb-3 mx-auto mr-3 w-100">
                <div class="card-header">Vaccine Records</div>
                <div class="card-body text-dark pb-0">
                    <ul style="list-style-type: none;">
                        <li><a class="btn btn-sm btn-success rounded-full mb-2" href="#">Vaccine Types</a></li>
                        <li><a class="btn btn-sm btn-success rounded-full mb-2" href="#">Vaccine Batches</a></li>
                        <li><a class="btn btn-sm btn-success rounded-full mb-2" href="#">Vaccine Allocations</a></li>
                    </ul>
                </div>
            </div>

        </div> --}}
    {{-- </div> --}}
</div>
@endsection
