<?php

namespace Database\Factories;

use App\Models\VaccineBatch;
use Illuminate\Database\Eloquent\Factories\Factory;

class VaccineBatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VaccineBatch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $val = $this->faker->numberBetween(10, 99) * 1000;
        return [
            'batch_no' => 'B' . $this->faker->numberBetween(10000000, 99999999),
            'vaccine_id' => '5',
            'vaccine_type' => 'Sinopham',
            'manufactured_date' => now()->subDays(100)->toDateString(),
            'expiration_date' => now()->addDay(500)->toDateString(),
            'initial_quantity' =>  $val,
            'current_quantity' => $val - $this->faker->numberBetween(1000, 2000),
        ];
    }
}
