<?php

namespace Database\Factories;

use App\Models\Contractor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contractor>
 */
class ContractorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'    => fake()->company(),
            'phone'   => fake()->optional(0.8)->phoneNumber(),
            'address' => fake()->optional(0.7)->address(),
            'email'   => fake()->optional(0.6)->companyEmail(),
            'own'     => false,
            'active'  => true,
        ];
    }

    public function own(): static
    {
        return $this->state(['own' => true]);
    }

    public function inactive(): static
    {
        return $this->state(['active' => false]);
    }
}
