<?php

namespace App\Repositories;

use App\Models\Contractor;
use App\Repositories\Contracts\ContractorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ContractorRepository implements ContractorRepositoryInterface
{
    public function getAll(): Collection
    {
        return Contractor::all();
    }
}
