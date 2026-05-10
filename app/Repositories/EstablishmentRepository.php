<?php

namespace App\Repositories;

use App\Models\Establishment;
use App\Repositories\Contracts\EstablishmentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EstablishmentRepository implements EstablishmentRepositoryInterface
{
    public function getAll(int $userId): Collection
    {
        return Establishment::whereHas('farmer', fn($q) => $q->where('user_id', $userId))->get();
    }

    public function findById(int $id): ?Establishment
    {
        return Establishment::find($id);
    }

    public function saveOrUpdate(array $data): ?Establishment
    {
        if (isset($data['id'])) {
            $establishment = Establishment::find($data['id']);
            if ($establishment === null) {
                return null;
            }
        } else {
            $establishment = new Establishment();
        }

        $establishment->farmer_id    = $data['farmer_id'];
        $establishment->name         = $data['name'];
        $establishment->external_code = $data['external_code'] ?? null;
        $establishment->locality     = $data['locality'] ?? null;
        $establishment->latitude     = $data['latitude'];
        $establishment->longitude    = $data['longitude'];
        $establishment->active       = $data['active'] ?? true;

        $establishment->save();

        return $establishment;
    }
}
