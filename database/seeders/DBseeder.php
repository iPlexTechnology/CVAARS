<?php

namespace Database\Seeders;

use App\Models\ResidentialArea;
use Illuminate\Database\Seeder;

class DBseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResidentialArea::create([
            'nic' => '111111V',
            'grama_niladhari_division_id' => '5',
            'moh_division_id' => '10',
        ]);

        ResidentialArea::create([
            'nic' => '222222V',
            'grama_niladhari_division_id' => '15',
            'moh_division_id' => '12',
        ]);

        ResidentialArea::create([
            'nic' => '333333V',
            'grama_niladhari_division_id' => '24',
            'moh_division_id' => '3',
        ]);

        ResidentialArea::create([
            'nic' => '444444V',
            'grama_niladhari_division_id' => '40',
            'moh_division_id' => '30',
        ]);

        ResidentialArea::create([
            'nic' => '555555V',
            'grama_niladhari_division_id' => '30',
            'moh_division_id' => '11',
        ]);
    }
}
