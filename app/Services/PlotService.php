<?php

namespace App\Services;

use App\Repositories\Contracts\PlotRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PlotService
{
    public function __construct(
        private readonly PlotRepositoryInterface $repository,
    ) {}

    public function getAllPlots(): Collection
    {
        return $this->repository->getAll();
    }
}
