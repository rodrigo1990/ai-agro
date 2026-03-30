<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'crop',
    'sowing_season',
    'cycle',
    'reference_name',
    'variety_hybrid',
    'sowing_distance_cm',
    'target_density_seeds_ha',
    'target_density_kg_ha',
    'target_sowing_date',
    'active',
])]
class CropPlan extends Model
{
    protected function casts(): array
    {
        return [
            'target_sowing_date'       => 'date',
            'sowing_distance_cm'       => 'decimal:2',
            'target_density_seeds_ha'  => 'decimal:2',
            'target_density_kg_ha'     => 'decimal:2',
            'active'                   => 'boolean',
        ];
    }

    public function campaigns(): HasMany
    {
        return $this->hasMany(Campaign::class);
    }
}
