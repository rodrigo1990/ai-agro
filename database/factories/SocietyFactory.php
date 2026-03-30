<?php

namespace Database\Factories;

use App\Models\Society;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Society>
 */
class SocietyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id'       => User::factory(),
            'business_name' => fake()->company(),
            'tax_id'        => fake()->numerify('##-########-#'),
            'country'       => 'Argentina',
            'logo'          => null,
        ];
    }
}
