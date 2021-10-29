<?php

namespace App\Http\Livewire;

use App\Models\CitizenRecord;
use App\Models\ReadyForVaccination;
use App\Models\VaccinatedRecord;
use App\Models\VaccinationCenter;
use App\Models\VaccineAllocation;
use App\Models\VaccineBatch;
use App\Models\VaccineType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MarkVaccination extends Component
{
    public $name;
    // public $vaccine_types;
    public $vaccine_batches;
    public $vaccine_batch;
    public $nic_no;
    public $nic;
    public $address;
    public $grama_niladhari_division;
    public $moh_division;
    public $district;
    public $province;
    public $vaccine_count;
    public $vaccination_time;
    public $vaccination_date;
    public $birthday;
    public $post_symptoms;
    public $vaccination_centers;
    public $vaccination_center;
    public $can_vaccinate_now;
    public $not_registered;
    public $not_today;

    public function mount()
    {
        $this->name = null;
        $this->nic_no = null;
        $this->nic = null;
        $this->address = null;
        $this->grama_niladhari_division = null;
        $this->moh_division = null;
        $this->district = null;
        $this->province = null;
        $this->post_symptoms = null;
        $this->vaccine_count = null;
        $this->vaccination_time = null;
        $this->vaccination_date = null;
        $this->birthday = null;
        $this->can_vaccinate_now = false;
        $this->not_registered = false;
        $this->not_today = false;
        $this->vaccination_centers = VaccinationCenter::orderBy('center_name')->get();
        // $this->vaccine_types = VaccineType::orderBy('name')->get();
        $this->vaccination_center = $this->vaccination_center;
        $this->vaccine_batches = collect();
    }

    public function boot()
    {
        $this->vaccination_centers = VaccinationCenter::orderBy('center_name')->get();
        $this->vaccination_center = $this->vaccination_center;
    }

    public function render()
    {
        return view('livewire.mark-vaccination');
    }

    public function updatedVaccinationCenter($id)
    {
        $this->vaccine_batches = VaccineAllocation::where('vaccination_center_id', $id)
            ->where('remaining_quantity', '>=', 0)->with('getVaccineBatch')->get();
    }

    public function search()
    {
        $user = CitizenRecord::where('nic', $this->nic_no)->with(['getMOHArea', 'getGramaNiladhariDivision', 'getPendingVaccination'])->first();
        // dd($user);

        $user_pending = ReadyForVaccination::where('nic', $this->nic_no)->first();

        if ($user_pending == null) {
            $this->can_vaccinate_now = false;
            $this->not_registered = true;
            $this->not_today = false;
            $this->name = null;
            $this->nic = null;
            $this->vaccine_count = null;
            $this->address = null;
            $this->grama_niladhari_division = null;
            $this->moh_division = null;
            $this->district = null;
            $this->province = null;
            $this->vaccination_time = null;
            $this->vaccination_date = null;
            $this->birthday = null;
        } elseif ($user->getPendingVaccination->dose_receiving_date != now()->toDateString() or $user->getPendingVaccination->vaccine_center_id != $this->vaccination_center) {
            $this->can_vaccinate_now = false;
            $this->not_registered = false;
            $this->not_today = true;
            $this->name = null;
            $this->nic = null;
            $this->vaccine_count = null;
            $this->address = null;
            $this->grama_niladhari_division = null;
            $this->moh_division = null;
            $this->district = null;
            $this->province = null;
            $this->vaccination_time = null;
            $this->vaccination_date = null;
            $this->birthday = null;
        } else {
            $this->name = $user->name;
            $this->nic = $user->nic;
            $this->address = $user->address;
            $this->grama_niladhari_division = $user->getGramaNiladhariDivision->grama_niladhari_division;
            $this->moh_division = $user->getMOHArea->moh_division;
            $this->district = $user->district;
            $this->province = $user->province;
            $this->vaccine_count = $user->dose_received + 1;
            $this->vaccination_time = $user->getPendingVaccination->dose_receiving_time;
            $this->vaccination_date = $user->getPendingVaccination->dose_receiving_date;
            $this->birthday = $user->birthday;
            $this->can_vaccinate_now = true;
            $this->not_registered = false;
            $this->not_today = false;
        }
    }

    public function submit()
    {
        //create new vaccinated record

        $user = CitizenRecord::where('nic', $this->nic)->with(['getMOHArea', 'getGramaNiladhariDivision', 'getPendingVaccination'])->first();

        DB::beginTransaction();

        try {
            $data = new VaccinatedRecord();
            $data->nic = $user->nic;
            $data->vaccinated_date = now()->toDateString();
            $data->dose_batch_id = $this->vaccine_batches[0]->getVaccineBatch->id;
            $data->vaccination_center_id = $this->vaccination_center;
            $data->dose_count = $user->dose_received + 1;
            $data->post_symptoms = $this->post_symptoms;
            $data->save();

            $data = ReadyForVaccination::where('nic', $this->nic)->first();
            $data->delete();

            $data = VaccineAllocation::where('id', $this->vaccine_batches[0]->id)->first();
            $data->remaining_quantity = ($this->vaccine_batches[0]->remaining_quantity - 1);
            $data->save();

            $user->dose_received = $user->dose_received + 1;
            $user->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->withErrors($th->getMessage());
        }
        // dd($this->nic);
    }
}
