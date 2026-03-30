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
}
