<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VaccineAllocation extends Model
{
    use HasFactory, SoftDeletes;

    public function getVaccineBatch()
    {
        return $this->hasOne('App\Models\VaccineBatch', 'id', 'dose_batch_id');
    }

    public function getVaccinationCenter()
    {
        return $this->hasOne('App\Models\VaccinationCenter', 'id', 'vaccination_center_id');
    }
}
