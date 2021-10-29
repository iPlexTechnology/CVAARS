<div>
    <div class=" row mb-3">
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

    <div class="row mb-3">
        <label for="batch_id" class="col-md-4 col-form-label fw-bold">Vaccine Batch</label>
        <div class="col-md-8">
            <select class="form-select form-select-sm rounded-full" wire:model="batch_id" name="batch_id" id="batch_id"
                required>
                <option value="{{ null }}">-- Select One --</option>
                @if($vaccine_id)
                @foreach ($vaccine_batches as $vaccine_batch)
                <option value="{{ $vaccine_batch->id }}">{{ $vaccine_batch->batch_no }} (Qty: {{
                    $vaccine_batch->current_quantity }})</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="available_qty" class="col-md-4 col-form-label fw-bold">Available dose Qty.</label>
        <div class="col-md-8">
            <input type="number" class="form-control form-control-sm rounded-full" name="available_qty"
                id="available_qty" value="{{ $batch_qty ?? 0 }}" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <label for="center_id" class="col-md-4 col-form-label fw-bold">Vaccination Center</label>
        <div class="col-md-8">
            <select class="form-select form-select-sm rounded-full" name="center_id" id="center_id" required>
                <option value="{{ null }}">-- Select One --</option>
                @foreach ($centers as $center)
                <option value="{{ $center->id }}">{{ $center->center_name }} ({{ $center->getMOHArea->moh_division }})
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="allocated_qty" class="col-md-4 col-form-label fw-bold">Allocate dose Qty.</label>
        <div class="col-md-8">
            <input type="number" class="form-control form-control-sm rounded-full" name="allocated_qty"
                id="allocated_qty" value="{{ $batch_qty ?? 0  }}" max="{{ $batch_qty ?? 0  }}">
        </div>
    </div>

</div>
