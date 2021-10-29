<div class="col-md-4 mt-5">
    <div class="bg-white rounded-2xl p-3" style="width: auto; height: 26rem;overflow: auto">
        <p class="text-pink-600 fs-5 font-bold">{{ __('Current Vaccination updates') }} @auth <button wire:click="edit"
                class="btn btn-sm rounded-pill btn-primary"><i class="bi bi-plus-circle"></i> Add</button> @endauth</p>



        @if ($is_edit)
        <form wire:submit.prevent="submit">

            <div class="mb-3">
                <label for="notice_en" class="form-label fw-bold">Notice (English)</label>
                <textarea class="form-control form-control-sm rounded-2xl" wire:model="notice_en" id="notice_en"
                    rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="notice_en" class="form-label fw-bold">Notice (Sinhala)</label>
                <textarea class="form-control form-control-sm rounded-2xl" wire:model="notice_si" id="notice_si"
                    rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="notice_en" class="form-label fw-bold">Notice (Tamil)</label>
                <textarea class="form-control form-control-sm rounded-2xl" wire:model="notice_ta" id="notice_ta"
                    rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-success btn-sm rounded-full"><i class="bi bi-save"></i> Save</button>

        </form>
        @else
        @foreach ($notices as $notice)
        <div class="alert alert-info rounded-2xl" role="alert">
            @if(app()->getLocale() == 'en') {{ $notice->english }} @endif
            @if(app()->getLocale() == 'si') {{ $notice->sinhala }} @endif
            @if(app()->getLocale() == 'ta') {{ $notice->tamil }} @endif
        </div>
        @endforeach
        @endif



    </div>
    <div class="mt-2 mb-1 clearfix">

    </div>
    <p class="text-dark font-bold text-right mb-0">{{ __('Total Vaccinated Count') }}</p>
    <p class="text-red-600 fs-1 font-bold text-right">{{ $count }}</p>
</div>
