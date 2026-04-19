<?php

namespace App\Repositories\Contracts;

use App\Models\Farmer;
use Illuminate\Database\Eloquent\Collection;

interface FarmerRepositoryInterface
{
    public function getAll(): Collection;
    public function getAllByUserId(int $userId): Collection;
    public function save(int $userId, array $data): Farmer;
}
