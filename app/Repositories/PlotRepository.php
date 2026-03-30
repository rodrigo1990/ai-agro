<?php

namespace App\Repositories;

use App\Models\Plot;
use App\Repositories\Contracts\PlotRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PlotRepository implements PlotRepositoryInterface
{
    public function getAll(): Collection
    {
        return Plot::all();
    }
}
