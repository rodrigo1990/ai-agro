<?php

namespace Database\Factories;

use App\Models\Farmer;
use App\Models\Society;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Farmer>
 */
class FarmerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'society_id'    => Society::factory(),
            'name'          => fake()->firstName(),
            'last_name'     => fake()->lastName(),
            'tax_id'        => fake()->numerify('##-########-#'),
            'user_id'       => null,
            'external_code' => fake()->optional(0.5)->bothify('EXT-####??'),
            'notes'         => fake()->optional(0.3)->sentence(),
        ];
    }
}
