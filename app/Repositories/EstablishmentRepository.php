<?php

namespace App\Repositories;

use App\Models\Establishment;
use App\Repositories\Contracts\EstablishmentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EstablishmentRepository implements EstablishmentRepositoryInterface
{
    public function getAll(): Collection
    {
        return Establishment::all();
    }
}
