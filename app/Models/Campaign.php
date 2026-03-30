<?php

namespace App\Models;

use Database\Factories\CampaignFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

#[Fillable([
    'farmer_id',
    'establishment_id',
    'plot_id',
    'crop_plan_id',
    'target_sowing_date',
    'sowing_date',
    'emergence_date',
    'dds',
    'gm',
    'variety_hybrid',
    'sowing_system',
    'des',
    'target_sown_area',
    'external_code',
    'notes',
    'active',
])]
class Campaign extends Model
{
    /** @use HasFactory<CampaignFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'target_sowing_date' => 'date',
            'sowing_date'        => 'date',
            'emergence_date'     => 'date',
            'gm'                 => 'decimal:2',
            'target_sown_area'   => 'decimal:2',
            'active'             => 'boolean',
        ];
    }

    public function farmer(): BelongsTo
    {
        return $this->belongsTo(Farmer::class);
    }

    public function establishment(): BelongsTo
    {
        return $this->belongsTo(Establishment::class);
    }

    public function plot(): BelongsTo
    {
        return $this->belongsTo(Plot::class);
    }

    public function cropPlan(): BelongsTo
    {
        return $this->belongsTo(CropPlan::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
