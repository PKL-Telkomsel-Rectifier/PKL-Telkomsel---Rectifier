<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataRectifier>
 */
class DataRectifierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rectifier_id' => mt_rand(1, 30),
            'voltage' => $this->faker->randomFloat(2, 30, 50),
            'current' => $this->faker->randomFloat(2, 20, 50),
            'temp' => $this->faker->randomFloat(2, 0, 30),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
