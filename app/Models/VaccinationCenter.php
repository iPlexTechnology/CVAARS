<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VaccinationCenter extends Model
{
    use HasFactory;

    public function getMOHArea()
    {
        return $this->belongsTo('App\Models\MohDivision', 'moh_division_id', 'id');
    }

    public function getGramaNiladhariArea()
    {
        return $this->belongsTo('App\Models\GramaNiladhariDivision', 'grama_niladhari_division_id', 'id');
    }

    public function getRemainingVaccine()
    {
        return $this->hasMany('App\Models\VaccineAllocation', 'vaccination_center_id', 'id');
    }
}
