<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenRecord extends Model
{
    use HasFactory;

    protected $primaryKey = 'nic';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    public function getMOHArea()
    {
        return $this->hasOne('App\Models\MohDivision', 'id', 'moh_division_id');
    }

    public function getGramaNiladhariDivision()
    {
        return $this->hasOne('App\Models\GramaNiladhariDivision', 'id', 'grama_niladhari_division_id');
    }

    public function getPendingVaccination()
    {
        return $this->hasOne('App\Models\ReadyForVaccination', 'nic', 'nic');
    }
}
