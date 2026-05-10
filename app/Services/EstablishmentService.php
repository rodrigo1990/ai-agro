<?php

namespace App\Services;

use App\Models\Establishment;
use App\Repositories\Contracts\EstablishmentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EstablishmentService
{
    public function __construct(
        private readonly EstablishmentRepositoryInterface $repository,
    ) {}

    public function getAllEstablishments(int $userId): Collection
    {
        return $this->repository->getAll($userId);
    }

    public function getEstablishmentById(int $id): ?Establishment
    {
        return $this->repository->findById($id);
    }

    public function saveOrUpdate(array $data): ?Establishment
    {
        return $this->repository->saveOrUpdate($data);
    }
}
