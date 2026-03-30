<?php

namespace Database\Seeders;

use App\Models\CropPlan;
use Illuminate\Database\Seeder;

class CropPlanSeeder extends Seeder
{
    private const PLANS = [
        ['crop' => 'Soja',    'sowing_season' => 'De primera',  'cycle' => '2025/2026', 'variety_hybrid' => 'DM 6.2i',    'sowing_distance_cm' => 52, 'target_density_seeds_ha' => 280000, 'target_density_kg_ha' => 80],
        ['crop' => 'Soja',    'sowing_season' => 'De segunda',  'cycle' => '2025/2026', 'variety_hybrid' => 'NS 4.9',     'sowing_distance_cm' => 35, 'target_density_seeds_ha' => 350000, 'target_density_kg_ha' => 95],
        ['crop' => 'Soja',    'sowing_season' => 'De primera',  'cycle' => '2024/2025', 'variety_hybrid' => 'AW 4717',    'sowing_distance_cm' => 52, 'target_density_seeds_ha' => 270000, 'target_density_kg_ha' => 75],
        ['crop' => 'Maíz',    'sowing_season' => 'De primera',  'cycle' => '2025/2026', 'variety_hybrid' => 'DK 7210',    'sowing_distance_cm' => 70, 'target_density_seeds_ha' => 90000,  'target_density_kg_ha' => 25],
        ['crop' => 'Maíz',    'sowing_season' => 'De segunda',  'cycle' => '2025/2026', 'variety_hybrid' => 'P1630W',     'sowing_distance_cm' => 70, 'target_density_seeds_ha' => 80000,  'target_density_kg_ha' => 22],
        ['crop' => 'Maíz',    'sowing_season' => 'De primera',  'cycle' => '2024/2025', 'variety_hybrid' => 'SY 971 VIP3','sowing_distance_cm' => 70, 'target_density_seeds_ha' => 85000,  'target_density_kg_ha' => 23],
        ['crop' => 'Trigo',   'sowing_season' => 'Invierno',    'cycle' => '2025/2026', 'variety_hybrid' => 'SY 200',     'sowing_distance_cm' => 17, 'target_density_seeds_ha' => 350000, 'target_density_kg_ha' => 140],
        ['crop' => 'Trigo',   'sowing_season' => 'Invierno',    'cycle' => '2024/2025', 'variety_hybrid' => 'Klein Zorro','sowing_distance_cm' => 17, 'target_density_seeds_ha' => 320000, 'target_density_kg_ha' => 130],
        ['crop' => 'Girasol', 'sowing_season' => 'De primera',  'cycle' => '2025/2026', 'variety_hybrid' => 'Paraíso 20', 'sowing_distance_cm' => 70, 'target_density_seeds_ha' => 55000,  'target_density_kg_ha' => 5],
        ['crop' => 'Sorgo',   'sowing_season' => 'De primera',  'cycle' => '2025/2026', 'variety_hybrid' => 'Energía',    'sowing_distance_cm' => 52, 'target_density_seeds_ha' => 200000, 'target_density_kg_ha' => 10],
    ];

    public function run(): void
    {
        foreach (self::PLANS as $plan) {
            $plan['reference_name'] = "{$plan['crop']} | {$plan['sowing_season']} | {$plan['cycle']}";
            $plan['target_sowing_date'] = null;
            CropPlan::factory()->create($plan);
        }
    }
}
