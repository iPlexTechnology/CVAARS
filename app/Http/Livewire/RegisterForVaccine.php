<?php

namespace App\Http\Livewire;

use App\Models\CitizenRecord;
use Livewire\Component;

class RegisterForVaccine extends Component
{
    public $fname;
    public $lname;
    public $nic;
    public $birthday;
    public $address;
    public $email;
    public $phone;
    public $confirm;

    public function mount()
    {
        $this->fname = '';
        $this->lname = '';
        $this->nic = '';
        $this->birthday = '';
        $this->address = '';
        $this->email = '';
        $this->phone = '';
        $this->confirm = false;
    }

    protected function rules()
    {
        return [
            'fname' => 'bail|required|alpha|max:50',
            'lname' => 'bail|required|alpha|max:50',
            'nic' => 'bail|required|alpha_num|max:12',
            'birthday' => 'bail|required|date|before:today',
            'address' => 'bail|required|string',
            'email' => 'bail|required|email|max:50',
            'phone' => 'bail|required|alpha_num',
        ];
    }

    protected $validationAttributes = [
        'fname' => 'First name',
        'lname' => 'Last name',
        'nic' => 'NIC no',
    ];

    public function render()
    {
        return view('livewire.register-for-vaccine');
    }

    public function submitForm()
    {
        $this->validate();

        // $person =

        try {
            CitizenRecord::create([
                'name' => $this->fname . ' ' . $this->lname,
                'nic' => $this->nic,
                'birthday' => $this->birthday,
                'address' => $this->address,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }

        return back()->with('success', 'Password updated!');
    }
}
