<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CropPlanRepositoryInterface
{
    public function getAll(): Collection;
}
