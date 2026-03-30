<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface EstablishmentRepositoryInterface
{
    public function getAll(): Collection;
}
