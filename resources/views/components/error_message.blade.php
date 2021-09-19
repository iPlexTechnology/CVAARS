@forelse ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Whoops!</strong> {{ $error }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@empty
@endforelse
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{ session()->pull('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
