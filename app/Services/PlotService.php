<?php

namespace App\Services;

use App\Models\Plot;
use App\Repositories\Contracts\PlotRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PlotService
{
    public function __construct(
        private readonly PlotRepositoryInterface $repository,
    ) {}

    public function getAllPlots(int $userId): Collection
    {
        return $this->repository->getAll($userId);
    }

    public function getPlotById(int $id): ?Plot
    {
        return $this->repository->findById($id);
    }

    public function saveOrUpdate(array $data): ?Plot
    {
        return $this->repository->saveOrUpdate($data);
    }
}
