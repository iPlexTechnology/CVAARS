<?php

namespace App\Http\Livewire;

use App\Mail\RegisteredForVaccination;
use App\Models\CitizenRecord;
use App\Models\ResidentialArea;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class RegisterForVaccine extends Component
{
    public $first_name;
    public $last_name;
    public $nic;
    public $birthday;
    public $address;
    public $email;
    public $phone;
    public $confirm;
    public $province;
    public $district;
    public $provinces;

    public function mount()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->nic = '';
        $this->birthday = '';
        $this->address = '';
        $this->email = '';
        $this->phone = '';
        $this->provinces = array();
        $this->confirm = false;
    }

    protected function rules()
    {
        return [
            'first_name' => 'bail|required|alpha|max:50',
            'last_name' => 'bail|required|alpha|max:50',
            'nic' => 'bail|required|alpha_num|unique:citizen_records,nic|max:12',
            'birthday' => 'bail|required|date|before:today',
            'address' => 'bail|required|string',
            'email' => 'bail|required|email|unique:citizen_records,email|max:50',
            'phone' => 'bail|required|alpha_num',
            'district' => 'bail|required|string|max:50',
            'province' => 'bail|required|string|max:50',
        ];
    }

    public function render()
    {
        return view('livewire.register-for-vaccine');
    }

    public function submitForm()
    {
        $this->validate();

        $person = ResidentialArea::where('nic', $this->nic)->first();
        if ($person == null) return back()->with('error', 'We could not verify this NIC number.');
        DB::beginTransaction();
        try {
            CitizenRecord::create([
                'name' => $this->first_name . ' ' . $this->last_name,
                'nic' => $this->nic,
                'birthday' => $this->birthday,
                'address' => $this->address,
                'email' => $this->email,
                'phone' => $this->phone,
                'province' => $this->province,
                'district' => $this->district,
                'moh_division_id' => $person->moh_division_id,
                'grama_niladhari_division_id' => $person->grama_niladhari_division_id,
            ]);

            $body = [
                'name' => $this->first_name . ' ' . $this->last_name,
            ];
            Mail::to($this->email)->send(new RegisteredForVaccination($body));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Something went wrong. Please contact our support team.');
        }

        //send a email

        return back()->with('success', 'Registration Completed. You will receive a confirmation email.');
    }

    public function updatingProvince($val)
    {
        if ($val == "Central Province") $this->provinces = array('Kandy', 'Mathale', 'Nuwara Eliya');
        else if ($val == "Eastern Province") $this->provinces = array('Ampara', 'Batticaloa', 'Trincomalee');
        else if ($val == "North Central Province") $this->provinces = array('Anuradhapura', 'Polonnaruwa');
        else if ($val == "North Western Province") $this->provinces = array('Kurunegala', 'Puttalam');
        else if ($val == "Northern Province") $this->provinces = array('Jaffna', 'Kilinochchi', 'Mannar', 'Mullaitivu', 'Vavuniya');
        else if ($val == "Sabaragamuwa Province") $this->provinces = array('Kegalle', 'Ratnapura');
        else if ($val == "Southern Province") $this->provinces = array('Galle', 'Hambantota', 'Matara');
        else if ($val == "Uva Province") $this->provinces = array('Badulla', 'Monaragala');
        else if ($val == "Western Province") $this->provinces = array('Colombo', 'Gampaha', 'Kalutara');
    }
}
