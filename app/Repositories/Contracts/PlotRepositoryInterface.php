<?php

namespace App\Repositories\Contracts;

use App\Models\Plot;
use Illuminate\Database\Eloquent\Collection;

interface PlotRepositoryInterface
{
    public function getAll(int $userId): Collection;
    public function findById(int $id): ?Plot;
    public function saveOrUpdate(array $data): ?Plot;
}
