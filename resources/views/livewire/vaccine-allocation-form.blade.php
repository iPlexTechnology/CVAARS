{{-- <div class="row mb-3">
    <label for="batch_no" class="col-md-4 col-form-label fw-bold">Vaccine Type</label>
    <div class="col-md-8">
        <input type="text" class="form-control form-control-sm rounded-full" name="batch_no" id="batch_no"
            value="{{ old('batch_no') }}" required>
    </div>
</div> --}}

<div class="row mb-3">
    <label for="vaccine_id" class="col-md-4 col-form-label fw-bold">Vaccine Type</label>
    <div class="col-md-8">
        <select class="form-select form-select-sm rounded-full" wire:model="vaccine_id" name="vaccine_id"
            id="vaccine_id" required>
            <option value="{{ null }}">-- Select One --</option>
            @foreach ($vaccine_types as $vaccine_type)
            <option value="{{ $vaccine_type->id }}">{{ $vaccine_type->name }} ({{
                $vaccine_type->manufactured_country }})</option>
            @endforeach
        </select>
    </div>
</div>

{{-- <div class="row mb-3">
    <label for="manufactured_date" class="col-md-4 col-form-label fw-bold">Manufactured Date</label>
    <div class="col-md-8">
        <input type="date" class="form-control form-control-sm rounded-full" name="manufactured_date"
            id="manufactured_date" value="{{ old('manufactured_date') }}" required>
    </div>
</div> --}}

{{-- <div class="row mb-3">
    <label for="expiration_date" class="col-md-4 col-form-label fw-bold">Expiration Date</label>
    <div class="col-md-8">
        <input type="date" class="form-control form-control-sm rounded-full" name="expiration_date" id="expiration_date"
            value="{{ old('expiration_date') }}" required>
    </div>
</div> --}}

{{-- <div class="row mb-3">
    <label for="quantity" class="col-md-4 col-form-label fw-bold">Recieved Quantity</label>
    <div class="col-md-8">
        <input type="number" class="form-control form-control-sm rounded-full" name="quantity" id="quantity"
            value="{{ old('quantity') }}" required>
    </div>
</div> --}}
