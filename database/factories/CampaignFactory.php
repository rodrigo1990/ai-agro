<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\CropPlan;
use App\Models\Establishment;
use App\Models\Farmer;
use App\Models\Plot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Campaign>
 */
class CampaignFactory extends Factory
{
    private const SOWING_SYSTEMS = ['Directa', 'Convencional', 'Mínima labranza'];

    public function definition(): array
    {
        $sowingDate    = fake()->dateTimeBetween('-1 year', 'now');
        $emergenceDate = fake()->dateTimeBetween($sowingDate, '+20 days');
        $targetDate    = fake()->dateTimeBetween('-10 days', '+10 days');
        $dds           = (int) $emergenceDate->diff(new \DateTime())->days;

        return [
            'farmer_id'          => Farmer::factory(),
            'establishment_id'   => Establishment::factory(),
            'plot_id'            => Plot::factory(),
            'crop_plan_id'       => CropPlan::factory(),
            'target_sowing_date' => $targetDate,
            'sowing_date'        => $sowingDate,
            'emergence_date'     => $emergenceDate,
            'dds'                => $dds,
            'gm'                 => fake()->randomFloat(2, 3.0, 8.9),
            'variety_hybrid'     => fake()->bothify('Var-????-##'),
            'sowing_system'      => fake()->randomElement(self::SOWING_SYSTEMS),
            'des'                => fake()->randomFloat(2, 50000, 350000) . ' pl/ha',
            'target_sown_area'   => fake()->randomFloat(2, 5, 500),
            'external_code'      => fake()->bothify('CAMP-####??'),
            'notes'              => fake()->optional(0.3)->sentence(),
            'active'             => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(['active' => false]);
    }
}
