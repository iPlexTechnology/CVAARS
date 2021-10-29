<?php

namespace Database\Seeders;

use App\Models\VaccineType;
use Illuminate\Database\Seeder;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VaccineType::create([
            'name' => 'AstraZeneca',
            'manufactured_country' => 'UK',
            'technology' => 'Viral Vector Vaccine',
            'next_dose_duration_in_weeks' => '12',
        ]);
        VaccineType::create([
            'name' => 'Moderna',
            'manufactured_country' => 'USA',
            'technology' => 'mRNA',
            'next_dose_duration_in_weeks' => '4',
        ]);
        VaccineType::create([
            'name' => 'Pfizer',
            'manufactured_country' => 'USA',
            'technology' => 'mRNA',
            'next_dose_duration_in_weeks' => '4',
        ]);
        VaccineType::create([
            'name' => 'Johnson & Johnson',
            'manufactured_country' => 'USA',
            'technology' => 'Viral Vector Vaccine',
            'next_dose_duration_in_weeks' => '0',
        ]);
        VaccineType::create([
            'name' => 'Sinopham',
            'manufactured_country' => 'China',
            'technology' => 'Inactive Vaccine',
            'next_dose_duration_in_weeks' => '3',
        ]);
        VaccineType::create([
            'name' => 'Sinovac',
            'manufactured_country' => 'China',
            'technology' => 'Inactive Vaccine',
            'next_dose_duration_in_weeks' => '3',
        ]);
    }
}
