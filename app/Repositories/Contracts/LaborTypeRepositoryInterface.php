<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface LaborTypeRepositoryInterface
{
    public function getAll(): Collection;
}
