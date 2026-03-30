<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface FarmerRepositoryInterface
{
    public function getAll(): Collection;
}
