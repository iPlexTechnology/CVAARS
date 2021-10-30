<?php

namespace Database\Seeders;

use App\Models\Notice;
use App\Models\ResidentialArea;
use App\Models\User;
use App\Models\VaccinationCenter;
use App\Models\VaccineAllocation;
use App\Models\VaccineBatch;
use Illuminate\Database\Seeder;

class FakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->count(50)->create();
        VaccineBatch::factory()->count(200)->create();
        VaccinationCenter::factory()->count(100)->create();
        VaccineAllocation::factory()->count(100)->create();
        Notice::factory()->count(10)->create();
        ResidentialArea::factory()->count(10000)->create();
    }
}
