<?php

namespace Database\Factories;

use App\Models\Establishment;
use App\Models\Farmer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Establishment>
 */
class EstablishmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'farmer_id'     => Farmer::factory(),
            'name'          => fake()->words(2, true),
            'external_code' => fake()->optional(0.5)->bothify('EST-####??'),
            'locality'      => fake()->city(),
            'latitude'      => fake()->randomFloat(7, -42, -22),
            'longitude'     => fake()->randomFloat(7, -68, -53),
            'active'        => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(['active' => false]);
    }
}
