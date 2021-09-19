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
}
