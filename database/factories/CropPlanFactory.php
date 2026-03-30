<?php

namespace Database\Factories;

use App\Models\CropPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CropPlan>
 */
class CropPlanFactory extends Factory
{
    private const CROPS = ['Soja', 'Maíz', 'Trigo', 'Girasol', 'Sorgo'];
    private const SOWING_SEASONS = ['De primera', 'De segunda', 'De tercera'];
    private const CYCLES = ['2024/2025', '2025/2026', '2026/2027'];

    public function definition(): array
    {
        $crop          = fake()->randomElement(self::CROPS);
        $sowingSeason  = fake()->randomElement(self::SOWING_SEASONS);
        $cycle         = fake()->randomElement(self::CYCLES);

        return [
            'crop'                     => $crop,
            'sowing_season'            => $sowingSeason,
            'cycle'                    => $cycle,
            'reference_name'           => "{$crop} | {$sowingSeason} | {$cycle}",
            'variety_hybrid'           => fake()->optional(0.7)->bothify('Var-????-##'),
            'sowing_distance_cm'       => fake()->optional(0.6)->randomFloat(2, 35, 70),
            'target_density_seeds_ha'  => fake()->optional(0.6)->randomFloat(2, 100000, 400000),
            'target_density_kg_ha'     => fake()->optional(0.6)->randomFloat(2, 60, 200),
            'target_sowing_date'       => fake()->optional(0.7)->dateTimeBetween('-6 months', '+6 months'),
            'active'                   => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(['active' => false]);
    }
}
