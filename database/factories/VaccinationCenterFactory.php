<?php

namespace Database\Factories;

use App\Models\VaccinationCenter;
use Illuminate\Database\Eloquent\Factories\Factory;

class VaccinationCenterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VaccinationCenter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'center_name' => 'B' . $this->faker->words(3, true),
            'moh_division_id' => $this->faker->numberBetween(1, 75),
            'grama_niladhari_division_id' => $this->faker->numberBetween(1, 100),
            'head_person' => 'Dr ' . $this->faker->name(),
        ];
    }
}
