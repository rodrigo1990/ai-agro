<?php

namespace Database\Factories;

use App\Models\LaborType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LaborType>
 */
class LaborTypeFactory extends Factory
{
    private const WORK_ORDER_TYPES = [
        'Orden de aplicación',
        'Orden de siembra',
        'Orden de cosecha',
        'Orden de fertilización',
        'Orden de labranza',
    ];

    private const CATEGORIES = ['Herbicida', 'Fungicida', 'Insecticida', 'Fertilizante', null];

    public function definition(): array
    {
        return [
            'description'     => fake()->words(3, true),
            'work_order_type' => fake()->randomElement(self::WORK_ORDER_TYPES),
            'category'        => fake()->randomElement(self::CATEGORIES),
            'active'          => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(['active' => false]);
    }
}
