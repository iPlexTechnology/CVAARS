<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use App\Models\VaccinatedRecord;
use Livewire\Component;

class Notices extends Component
{
    public $notices;
    public $is_edit;
    public $notice_en;
    public $notice_si;
    public $notice_ta;
    public $count;

    public function boot()
    {
        $this->notices = Notice::orderByDesc('id')->get();
        $this->is_edit = false;
        $newcount = VaccinatedRecord::all();
        $this->count = env('STARTING_VACCINE_COUNT') + count($newcount);
    }

    public function render()
    {
        return view('livewire.notices');
    }

    public function edit()
    {
        $this->is_edit = true;
    }

    public function submit()
    {
        $data = new Notice();
        $data->english = $this->notice_en;
        $data->tamil = $this->notice_en;
        $data->sinhala = $this->notice_en;
        $data->save();
    }
}
