<?php

namespace Database\Factories;

use App\Models\VaccineAllocation;
use Illuminate\Database\Eloquent\Factories\Factory;

class VaccineAllocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VaccineAllocation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $val = $this->faker->numberBetween(1, 20) * 1000;
        return [
            'dose_batch_id' => $this->faker->numberBetween(1, 200),
            'vaccination_center_id' => $this->faker->numberBetween(1, 100),
            'allocated_quantity' => $val,
            'remaining_quantity' => $val,
        ];
    }
}
