<div>
    <div class="clearfix col-lg-12 mx-auto mt-5">
        <form wire:submit.prevent="search">
            <div class="col-md-3 float-start">
                <select class="form-select rounded-full" wire:model="vaccination_center" id="vaccination_center"
                    required>
                    <option value="{{ null }}">-- Select Vaccination Center --</option>
                    @foreach ($vaccination_centers as $vaccination_center)
                    <option value="{{ $vaccination_center->id }}">{{ $vaccination_center->center_name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="col-md-2 ms-3 float-start">
                <select class="form-select rounded-full" wire:model="vaccine_type" id="vaccine_type" required>
                    <option value="{{ null }}">-- Select Vaccine Type --</option>
                    @foreach ($vaccine_types as $vaccine_type)
                    <option value="{{ $vaccine_type->id }}">{{ $vaccine_type->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="col-md-5 ms-3 float-start">
                <select class="form-select rounded-full" wire:model="vaccine_batch" id="vaccine_batch" required>
                    <option value="{{ null }}">-- Select Vaccine batch --</option>
                    @foreach ($vaccine_batches as $vaccine_batch)
                    <option value="{{ $vaccine_batch->dose_batch_id }}">{{ $vaccine_batch->getVaccineBatch->vaccine_type
                        }}
                        - {{ $vaccine_batch->getVaccineBatch->batch_no }}
                        (Qty: {{ $vaccine_batch->remaining_quantity }})
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 ms-3 float-start">
                <input type="text" class="form-control rounded-full" placeholder="NIC number" wire:model="nic_no"
                    id="nic_no" autocomplete="off" required autofocus>
            </div>

            <div class="float-end">
                <button type="submit" class="btn rounded-full btn-primary"><i class="bi bi-search"></i> Search</button>
            </div>
        </form>
    </div>

    <div class="mt-5 row">

        <div class="col-md-6">

            <div class="mb-3 row">
                <label for="name" class="col-sm-3 col-form-label fw-bold">Name</label>
                <div class="col-sm-8">
                    <input type="text" wire:model="name" class="form-control form-control-sm rounded-full" id="name"
                        readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nic" class="col-sm-3 col-form-label fw-bold">NIC</label>
                <div class="col-sm-8">
                    <input type="text" wire:model="nic" class="form-control form-control-sm rounded-full" id="name"
                        readonly>
                </div>
            </div>


            <div class="mb-3 row">
                <label for="address" class="col-sm-3 col-form-label fw-bold">Address</label>
                <div class="col-sm-8">
                    <textarea name="address" wire:model="address" id="address"
                        class="form-control form-control-sm rounded-xl" rows="3" readonly></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="birthday" class="col-sm-3 col-form-label fw-bold">Birthday</label>
                <div class="col-sm-8">
                    <input type="date" wire:model="birthday" class="form-control form-control-sm rounded-full"
                        id="birthday" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="vaccination_date" class="col-sm-3 col-form-label fw-bold">Vaccination Date</label>
                <div class="col-sm-8">
                    <input type="date" wire:model="vaccination_date" class="form-control form-control-sm rounded-full"
                        id="vaccination_date" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="vaccination_time" class="col-sm-3 col-form-label fw-bold">Vaccination Time</label>
                <div class="col-sm-8">
                    <input type="time" wire:model="vaccination_time" class="form-control form-control-sm rounded-full"
                        id="vaccination_time" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="province" class="col-sm-3 col-form-label fw-bold">Province</label>
                <div class="col-sm-8">
                    <input type="text" wire:model="province" class="form-control form-control-sm rounded-full"
                        id="province" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="district" class="col-sm-3 col-form-label fw-bold">District</label>
                <div class="col-sm-8">
                    <input type="text" wire:model="district" class="form-control form-control-sm rounded-full"
                        id="district" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="moh_division" class="col-sm-3 col-form-label fw-bold">MOH Division</label>
                <div class="col-sm-8">
                    <input type="text" wire:model="moh_division" class="form-control form-control-sm rounded-full"
                        id="moh_division" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="grama_niladhari_division" class="col-sm-3 col-form-label fw-bold">Grama Niladhari
                    Division</label>
                <div class="col-sm-8">
                    <input type="text" wire:model="grama_niladhari_division"
                        class="form-control form-control-sm rounded-full" id="grama_niladhari_division" readonly>
                </div>
            </div>



        </div>

        <div class="col-md-6">

            @if ($not_registered)

            <div class="alert bg-red-400 text-white rounded-full text-center h5" role="alert">
                <i class="bi bi-x-circle"></i> This person's record not found on today's vaccination plan.
            </div>

            @elseif ($can_vaccinate_now)
            <div class="alert bg-green-600 text-white rounded-full text-center h4" role="alert">
                <i class="bi bi-check2-circle"></i> This person is eligible to get vaccinated
            </div>

            @if ($vaccine_count == 1)
            <button class="btn btn-info text-dark fw-bold" disabled>1<sup>st</sup> dose</button>
            @elseif ($vaccine_count == 2)
            <button class="btn bg-red-400 text-dark fw-bold" disabled>2<sup>nd</sup> dose</button>
            @endif


            <form wire:submit.prevent="submit">
                <div class="mb-3 row mt-4">
                    <div class="mb-3">
                        <label for="post_symptoms" class="form-label fw-bold">Post Symptoms</label>
                        <textarea name="post_symptoms" wire:model="post_symptoms" id="post_symptoms"
                            class="form-control form-control-sm rounded-xl" rows="3"></textarea>
                    </div>
                </div>

                <div class="mb-3 row mt-4">
                    <div class="mb-3 clearfix">
                        <button class="btn btn-danger btn-lg rounded-full float-end">Marked Vaccinated</button>
                    </div>
                </div>
            </form>

            @elseif($not_today)

            <div class="alert bg-red-600 text-white rounded-full text-center h4" role="alert">
                <i class="bi bi-x-circle"></i> This person is not eligible to get vaccinated
            </div>

            <div class="alert alert-danger" role="alert">
                This can happen because of either,

                <ul class="pt-3">
                    <li>This person is sitting at the wrong vaccination center.</li>
                    <li>This person is already vaccinated.</li>
                    <li>Reserved vaccination date of this person either passed or yet to come.</li>
                </ul>
            </div>

            @endif

            @include('components.error_message')

        </div>



    </div>
</div>
