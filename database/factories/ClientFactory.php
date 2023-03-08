<?php

namespace Database\Factories;

use App\Models\Cake;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cake_id'      => Cake::factory(),
            'name_client'  => $this->faker->name(),
            'email_client' => $this->faker->unique()->safeEmail()
        ];
    }
}
