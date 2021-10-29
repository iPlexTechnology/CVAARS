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

        <p class="fw-bold display-6">Add a CVAARS User</p>
        <a href="{{ route('users.index') }}" class="btn btn-secondary rounded-full">
            <i class="bi bi-arrow-left"></i> Go back</a>

        <div class="col-md-6 mx-auto mt-3 bg-white rounded-xl shadow-md px-4 pt-4 pb-2">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="alert alert-info" role="alert">
                    They will receive a email with login details.
                </div>
                <div class="row mb-3">
                    <label for="role_id" class="col-md-4 col-form-label fw-bold">User role</label>
                    <div class="col-md-8">
                        <select class="form-select form-select-sm rounded-full" name="role_id" id="role_id" required>
                            <option value="{{ null }}">-- Select One --</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label fw-bold">Email</label>
                    <div class="col-md-8">
                        <input type="email" class="form-control form-control-sm rounded-full" name="email" id="email"
                            required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label fw-bold">Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm rounded-full" name="name" id="name"
                            required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-form-label fw-bold">Phone</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control form-control-sm rounded-full" name="phone" id="phone">
                    </div>
                </div>

                <div class="clearfix mb-3">
                    <button type="submit" class="btn btn-sm rounded-full btn-success float-end"><i
                            class="bi bi-plus-circle"></i> Add
                        a user</button>
                </div>
                @include('components.error_message')
            </form>
        </div>


    </div>


</div>
@endsection
