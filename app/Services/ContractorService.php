<?php

namespace App\Services;

use App\Repositories\Contracts\ContractorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ContractorService
{
    public function __construct(
        private readonly ContractorRepositoryInterface $repository,
    ) {}

    public function getAllContractors(): Collection
    {
        return $this->repository->getAll();
    }
}
