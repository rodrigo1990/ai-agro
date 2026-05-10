<?php

namespace App\Repositories;

use App\Models\Plot;
use App\Repositories\Contracts\PlotRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PlotRepository implements PlotRepositoryInterface
{
    public function getAll(int $userId): Collection
    {
        return Plot::whereHas('farmer', fn($q) => $q->where('user_id', $userId))
            ->whereHas('establishment', fn($q) => $q->whereHas('farmer', fn($q) => $q->where('user_id', $userId)))
            ->get();
    }

    public function findById(int $id): ?Plot
    {
        return Plot::find($id);
    }

    public function saveOrUpdate(array $data): ?Plot
    {
        if (isset($data['id'])) {
            $plot = Plot::find($data['id']);
            if ($plot === null) {
                return null;
            }
        } else {
            $plot = new Plot();
        }

        $plot->farmer_id        = $data['farmer_id'];
        $plot->establishment_id = $data['establishment_id'];
        $plot->name             = $data['name'];
        $plot->active           = $data['active'] ?? true;
        $plot->area             = $data['area'];
        $plot->latitude         = $data['latitude'];
        $plot->longitude        = $data['longitude'];
        $plot->external_code    = $data['external_code'] ?? null;
        $plot->polygon          = $data['polygon'] ?? null;

        $plot->save();

        return $plot;
    }
}
