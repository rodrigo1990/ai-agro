<?php

namespace App\Repositories;

use App\Models\CropPlan;
use App\Repositories\Contracts\CropPlanRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CropPlanRepository implements CropPlanRepositoryInterface
{
    public function getAll(): Collection
    {
        return CropPlan::all();
    }

    public function findById(int $id): ?CropPlan
    {
        return CropPlan::find($id);
    }

    public function saveOrUpdate(array $data): ?CropPlan
    {
        if (isset($data['id'])) {
            $cropPlan = CropPlan::find($data['id']);
            if ($cropPlan === null) {
                return null;
            }
        } else {
            $cropPlan = new CropPlan();
        }

        $cropPlan->crop                      = $data['crop'];
        $cropPlan->sowing_season             = $data['sowing_season'];
        $cropPlan->cycle                     = $data['cycle'];
        $cropPlan->reference_name            = $data['reference_name'];
        $cropPlan->variety_hybrid            = $data['variety_hybrid'] ?? null;
        $cropPlan->sowing_distance_cm        = $data['sowing_distance_cm'] ?? null;
        $cropPlan->target_density_seeds_ha   = $data['target_density_seeds_ha'] ?? null;
        $cropPlan->target_density_kg_ha      = $data['target_density_kg_ha'] ?? null;
        $cropPlan->target_sowing_date        = $data['target_sowing_date'] ?? null;
        $cropPlan->active                    = $data['active'] ?? true;

        $cropPlan->save();

        return $cropPlan;
    }
}
