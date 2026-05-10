<?php

namespace App\Repositories\Contracts;

use App\Models\Establishment;
use Illuminate\Database\Eloquent\Collection;

interface EstablishmentRepositoryInterface
{
    public function getAll(): Collection;
    public function findById(int $id): ?Establishment;
    public function saveOrUpdate(array $data): ?Establishment;
}
