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

    public function findById(int $id): ?Farmer
    {
        return Farmer::find($id);
    }

    public function saveOrUpdate(int $userId, array $data): bool
    {
        if (isset($data['id']))
            $farmer = Farmer::find($data['id']);
        else
            $farmer = new Farmer();

        $farmer->user_id = $userId;
        $farmer->name = $data['name'];
        $farmer->last_name = $data['last_name'];
        $farmer->tax_id = $data['tax_id'];
        $farmer->external_code = $data['external_code'];
        $farmer->notes = $data['notes'];

        return $farmer->save();
    }
}
