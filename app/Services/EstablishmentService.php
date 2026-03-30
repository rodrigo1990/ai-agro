<?php

namespace App\Services;

use App\Repositories\Contracts\EstablishmentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EstablishmentService
{
    public function __construct(
        private readonly EstablishmentRepositoryInterface $repository,
    ) {}

    public function getAllEstablishments(): Collection
    {
        return $this->repository->getAll();
    }
}
