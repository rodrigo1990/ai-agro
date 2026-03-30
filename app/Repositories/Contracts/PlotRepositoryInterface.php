<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface PlotRepositoryInterface
{
    public function getAll(): Collection;
}
