<?php

namespace App\Repositories;

use App\Models\Farmer;
use App\Repositories\Contracts\FarmerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class FarmerRepository implements FarmerRepositoryInterface
{
    public function getAll(): Collection
    {
        return Farmer::all();
    }
}
