<?php

namespace App\Services;

use App\Repositories\Contracts\FarmerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class FarmerService
{
    public function __construct(
        private readonly FarmerRepositoryInterface $repository,
    ) {}

    public function getAllFarmers(): Collection
    {
        return $this->repository->getAll();
    }
}
