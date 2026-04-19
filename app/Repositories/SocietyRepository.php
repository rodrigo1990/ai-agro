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

    public function getByUserId(int $userId): ?Society
    {
        return Society::where('user_id', $userId)->first();
    }

    public function saveByUserId(int $userId, array $data): Society
    {
        return Society::updateOrCreate(
            ['user_id' => $userId],
            $data
        );
    }
}
