<div class="col-md-8 pt-5">
    <form class="row g-3 w-75 mx-auto" wire:submit.prevent="submitForm" method="post">
        @include('components.error_message')
        @csrf
        <div class="col-md-6">
            <label for="fname" class="form-label font-bold">{{ __('First Name') }}</label>
            <input type="text" wire:model="fname" class="form-control rounded-full" max="50" maxlength="50" id="fname"
                required>
        </div>
        <div class="col-md-6">
            <label for="lname" class="form-label font-bold">{{ __('Last Name') }}</label>
            <input type="text" wire:model="lname" class="form-control rounded-full" max="50" maxlength="50" id="lname"
                required>
        </div>
        <div class="col-md-7">
            <label for="nic" class="form-label font-bold">{{ __('NIC no') }}</label>
            <input type="text" wire:model="nic" class="form-control rounded-full" max="12" maxlength="12" id="nic"
                required>
        </div>
        <div class="col-md-5">
            <label for="birthday" class="form-label font-bold">{{ __('Birthday') }}</label>
            <input type="date" wire:model="birthday" class="form-control rounded-full" id="Birthday" required>
        </div>
        <div class="col-md-12">
            <label for="address" class="form-label font-bold">{{ __('Address') }}</label>
            <textarea type="text" wire:model="address" class="form-control rounded-xl" id="address" required></textarea>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label font-bold">{{ __('Email Address') }}</label>
            <input type="email" wire:model="email" class="form-control rounded-full" max="50" maxlength="50" id="email"
                required>
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label font-bold">{{ __('Phone') }}</label>
            <input type="phone" wire:model="phone" class="form-control rounded-full" max="10" maxlength="10" id="phone"
                required>
        </div>
        <div class="col-md-6">
            <label for="province" class="form-label font-bold">{{ __('Province') }}</label>
            <select class="form-select rounded-full" id="province" required>
                <option value="{{ null }}" selected>--{{ __('Select a province') }}--</option>
                <option value="Central Province">{{ __('Central Province') }}</option>
                <option value="Eastern Province">{{ __('Eastern Province') }}</option>
                <option value="Northern Province">{{ __('Northern Province') }}</option>
                <option value="Southern Province">{{ __('Southern Province') }}</option>
                <option value="Western Province ">{{ __('Western Province') }}</option>
                <option value="North Western Province ">{{ __('North Western Province') }}</option>
                <option value="North Central Province ">{{ __('North Central Province') }}</option>
                <option value="Uva Province ">{{ __('Uva Province') }}</option>
                <option value="Sabaragamuwa Province ">{{ __('Sabaragamuwa Province') }}</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="district" class="form-label font-bold">{{ __('District') }}</label>
            <select class="form-select rounded-full" id="district">
                <option value="{{ null }}" selected>--{{ __('Select a district') }}--</option>
            </select>
        </div>

        <hr>

        <div class="col-12">
            <i>
                "{{ __('I declare that the particulars furnished above are true and correct to the best of my knowledge, and that I, hereby a citizen of Sri Lanka and that I have not received or registered to receive a COVID vaccine before.') }}"
            </i>
        </div>

        <div class="col-12 clearfix">
            <div class="float-start">
                <div class="form-check">
                    <input wire:model="confirm" class="form-check-input" type="checkbox" id="confirm">
                    <label class="form-check-label font-bold" for="confirm">
                        {{ __('I agree') }}
                    </label>
                </div>
            </div>

            <div class="float-end">
                <button type="submit"
                    class="btn btn-dark rounded-full @if (!$confirm) disabled @endif">{{ __('Register') }}</button>
            </div>

        </div>



    </form>
</div>
