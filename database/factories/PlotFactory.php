<?php

namespace Database\Factories;

use App\Models\Establishment;
use App\Models\Farmer;
use App\Models\Plot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Plot>
 */
class PlotFactory extends Factory
{
    public function definition(): array
    {
        return [
            'farmer_id'        => Farmer::factory(),
            'establishment_id' => Establishment::factory(),
            'name'             => 'Lote ' . fake()->bothify('??-##'),
            'active'           => true,
            'area'             => fake()->randomFloat(2, 5, 500),
            'latitude'         => fake()->randomFloat(7, -42, -22),
            'longitude'        => fake()->randomFloat(7, -68, -53),
            'polygon'          => null,
            'external_code'    => fake()->optional(0.5)->bothify('LOT-####??'),
        ];
    }

    public function inactive(): static
    {
        return $this->state(['active' => false]);
    }
}
