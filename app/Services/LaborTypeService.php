<?php

namespace App\Services;

use App\Repositories\Contracts\LaborTypeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class LaborTypeService
{
    public function __construct(
        private readonly LaborTypeRepositoryInterface $repository,
    ) {}

    public function getAllLaborTypes(): Collection
    {
        return $this->repository->getAll();
    }
}
