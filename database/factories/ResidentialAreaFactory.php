<?php

namespace Database\Factories;

use App\Models\ResidentialArea;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResidentialAreaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResidentialArea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nic' => $this->faker->numberBetween(50, 99) . $this->faker->numberBetween(100, 845) . $this->faker->numberBetween(1000, 9999) . 'V',
            'name' => $this->faker->name(),
            'grama_niladhari_division_id' => $this->faker->numberBetween(1, 108),
            'moh_division_id' => $this->faker->numberBetween(1, 75),
        ];
    }
}
