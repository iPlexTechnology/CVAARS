<?php

namespace App\Http\Livewire;

use App\Models\MohDivision;
use App\Models\VaccinationCenter;
use App\Models\VaccineBatch;
use App\Models\VaccineType;
use Livewire\Component;

class VaccineAllocationForm extends Component
{
    public $vaccine_types;
    public $vaccine_id = null;
    public $vaccine_batches;
    public $batch_id = null;
    public $batch_qty;
    public $center_id;
    public $centers;

    public function boot()
    {
        $this->vaccine_types = VaccineType::all();
        $this->centers = VaccinationCenter::orderBy('center_name')->with('getMOHArea')->get();
        $this->batch_qty = 0;
    }

    public function render()
    {
        return view('livewire.vaccine-allocation-form');
    }

    public function updatedVaccineId($id)
    {
        $this->vaccine_batches = VaccineBatch::where('vaccine_id', $id)->where('current_quantity', '>', 0)->get();
    }

    public function updatedBatchId($id)
    {
        if ($id) $this->batch_qty = VaccineBatch::find($id)->current_quantity;
    }
}
