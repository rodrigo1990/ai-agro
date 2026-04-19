<?php

namespace App\Repositories\Contracts;

use App\Models\Society;
use Illuminate\Database\Eloquent\Collection;

interface SocietyRepositoryInterface
{
    public function getAll(): Collection;
    public function getByUserId(int $id): ?Society;
}
