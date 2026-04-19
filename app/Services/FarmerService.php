<?php

namespace App\Services;

use App\Models\Farmer;
use App\Repositories\Contracts\FarmerRepositoryInterface;
use App\Repositories\Contracts\SocietyRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class FarmerService
{
    public function __construct(
        private readonly FarmerRepositoryInterface $repository,
    ) {}

    public function getAllFarmers(int $userId): Collection
    {
        return $this->repository->getAll($userId);
    }

    public function saveFarmerByUserId(int $userId, array $data): ?Farmer
    {
        return $this->repository->save($userId, $data);
    }
}
