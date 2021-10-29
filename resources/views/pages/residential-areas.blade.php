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

        <p class="fw-bold display-6">Peoples' records</p>

        <a href="{{ route('residential-areas.create') }}" class="btn btn-success rounded-full"><i
                class="bi bi-plus-circle"></i> Add a People's record list</a>

        <div class="mt-3">
            @include('components.error_message')
        </div>

        <div class="mt-3">

            @livewire('residential-area-list')

        </div>


    </div>


</div>
@endsection
