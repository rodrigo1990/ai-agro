<?php

namespace App\Services;

use App\Models\CropPlan;
use App\Repositories\Contracts\CropPlanRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CropPlanService
{
    public function __construct(
        private readonly CropPlanRepositoryInterface $repository,
    ) {}

    public function getAllCropPlans(): Collection
    {
        return $this->repository->getAll();
    }

    public function getCropPlanById(int $id): ?CropPlan
    {
        return $this->repository->findById($id);
    }
}
