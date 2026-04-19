<?php

namespace App\Repositories;

use App\Models\Society;
use App\Repositories\Contracts\SocietyRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SocietyRepository implements SocietyRepositoryInterface
{
    public function getAll(): Collection
    {
        return Society::all();
    }

    public function getByUserId(int $id): ?Society
    {
        return Society::find($id);
    }
}
