<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentialArea extends Model
{
    use HasFactory;

    public function getGramaNiladhariDivision()
    {
        return $this->hasOne('App\Models\GramaNiladhariDivision', 'id', 'grama_niladhari_division_id');
    }

    public function getRegistrationRecord()
    {
        return $this->hasOne('App\Models\CitizenRecord', 'nic', 'nic');
    }

    public function getVaccinationRecord()
    {
        return $this->hasOne('App\Models\VaccinatedRecord', 'nic', 'nic');
    }
}
