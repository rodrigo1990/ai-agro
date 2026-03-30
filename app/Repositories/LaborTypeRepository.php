<?php

namespace App\Repositories;

use App\Models\LaborType;
use App\Repositories\Contracts\LaborTypeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class LaborTypeRepository implements LaborTypeRepositoryInterface
{
    public function getAll(): Collection
    {
        return LaborType::all();
    }
}
