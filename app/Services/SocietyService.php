<?php

namespace App\Services;

use App\Models\Society;
use App\Repositories\Contracts\SocietyRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SocietyService
{
    public function __construct(
        private readonly SocietyRepositoryInterface $repository,
    ) {}

    public function getAllSocieties(): Collection
    {
        return $this->repository->getAll();
    }

    public function getSocietyByUserId(int $id): ?Society
    {
        return $this->repository->getByUserId($id);
    }
}
