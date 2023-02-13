<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rectifier>
 */
class RectifierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = ['TTC', 'Inner', 'Outer'];
        return [
            'name' => $this->faker->name,
            'site_name' => $this->faker->name,
            'rtpo' => $this->faker->word,
            'nsa' => $this->faker->word,
            'type' => $type[mt_rand(0, 2)],
            'ip_recti' => $this->faker->ipv4(),
            'community' => 'fake community',
            'version' => 1,
            'port' => 161,
            'oid_voltage' => $this->faker->ipv6(),
            'oid_current' => $this->faker->ipv6(),
            'oid_temp' => $this->faker->ipv6(),
        ];
    }
}
