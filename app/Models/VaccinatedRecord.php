<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinatedRecord extends Model
{
    use HasFactory;

    public function getBatch()
    {
        return $this->hasOne('App\Models\VaccineBatch', 'id', 'dose_batch_id');
    }
}
