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

    public function getAllByUserId(int $userId): Collection
    {
        return Farmer::where('user_id', $userId)->get();
    }

    public function save(int $userId, array $data): Farmer
    {
        return Farmer::updateOrCreate(
            ['user_id' => $userId],
            array_merge($data,)
        );
    }
}
