<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cake>
 */
class CakeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_cake'   => $this->faker->name(),
            'weight_cake' => $this->faker->numberBetween(500, 2000),
            'value'       => $this->faker->randomFloat(2, 50, 200),
            'quantity'    => $this->faker->numberBetween(3, 15)
        ];
    }
}
