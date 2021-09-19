@forelse ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ __('Oops!') }}</strong> {{ $error }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@empty
@endforelse
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ __('Success!') }}</strong> {{ __(session()->pull('success')) }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ __('Oops!') }}</strong> {{ __(session()->pull('error')) }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
