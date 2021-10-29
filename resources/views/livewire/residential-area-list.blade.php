<div>
    <div class="col-md-8 mx-auto mb-4">
        <div class="mb-3 row">
            <label for="grama_niladhari_division_id" class="col-sm-3 col-form-label font-bold">Grama Niladhari
                Division</label>
            <div class="col-sm-9">
                <select wire:model="grama_niladhari_division_id" class="form-select rounded-full"
                    id="grama_niladhari_division_id">
                    <option value="{{ null }}">-- Select --</option>
                    @foreach ($grama_niladhari_divisions as $grama_niladhari_division)
                    <option value={{ $grama_niladhari_division->id }}>
                        {{ $grama_niladhari_division->grama_niladhari_division }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <table class="table table-auto">
        <thead>
            <tr>
                <th>#</th>
                <th>NIC No</th>
                <th>Name</th>
                <th>Registered for Vaccination?</th>
                <th>Vaccine Received?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($residential_areas as $residential_area)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $residential_area->nic }}</td>
                <td>{{ $residential_area->name }}</td>
                <td>
                    @if ( $residential_area->getRegistrationRecord == null)
                    <span class="fw-bold text-danger">Not Registered</span>
                    @else
                    <span class="fw-bold text-success">Registered</span>
                    @endif
                </td>
                <td>
                    @if ( $residential_area->getVaccinationRecord == null)
                    <span class="fw-bold text-danger">No Vaccine Received</span>
                    @else
                    <span class="fw-bold text-success">Vaccine Received</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
