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

    public function getFarmerById(int $id): ?Farmer
    {
        return $this->repository->findById($id);
    }

    public function saveOrUpdate(int $userId, array $data): bool
    {
        return $this->repository->saveOrUpdate($userId, $data);
    }
}
