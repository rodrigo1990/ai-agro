<?php

namespace App\Repositories\Contracts;

use App\Models\CropPlan;
use Illuminate\Database\Eloquent\Collection;

interface CropPlanRepositoryInterface
{
    public function getAll(): Collection;
    public function findById(int $id): ?CropPlan;
    public function saveOrUpdate(array $data): ?CropPlan;
}
