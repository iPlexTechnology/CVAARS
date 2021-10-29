<?php

namespace App\Http\Livewire;

use App\Models\GramaNiladhariDivision;
use App\Models\MohDivision;
use App\Models\ResidentialArea;
use Livewire\Component;

class ResidentialAreaList extends Component
{
    public $residential_areas;
    // public $moh_divisions;
    // public $moh_division_id = null;
    public $grama_niladhari_divisions;
    public $grama_niladhari_division_id;

    public function mount()
    {
        $this->grama_niladhari_divisions = GramaNiladhariDivision::orderBy('grama_niladhari_division')->get();
        $this->residential_areas = collect();
    }

    public function render()
    {
        return view('livewire.residential-area-list');
    }

    public function updatedGramaNiladhariDivisionId($id)
    {
        $this->residential_areas = ResidentialArea::where('grama_niladhari_division_id', $id)->with(['getRegistrationRecord', 'getVaccinationRecord'])->get();
    }
}
