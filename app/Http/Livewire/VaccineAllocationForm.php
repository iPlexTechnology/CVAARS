<?php

namespace App\Http\Livewire;

use App\Models\VaccineType;
use Livewire\Component;

class VaccineAllocationForm extends Component
{
    public $vaccine_types;
    public $vaccine_id;

    public function boot()
    {
        $this->vaccine_types = VaccineType::all();
    }

    public function render()
    {
        return view('livewire.vaccine-allocation-form');
    }

    public function updatedVaccineId()
    {
        dd($this->vaccine_id);
    }
}
