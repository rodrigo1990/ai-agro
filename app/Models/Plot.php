<?php

namespace App\Models;

use Database\Factories\PlotFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

#[Fillable(['farmer_id', 'establishment_id', 'name', 'active', 'area', 'latitude', 'longitude', 'polygon', 'external_code'])]
class Plot extends Model
{
    /** @use HasFactory<PlotFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'area'      => 'decimal:2',
            'latitude'  => 'decimal:7',
            'longitude' => 'decimal:7',
            'active'    => 'boolean',
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

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'plot_user')->withTimestamps();
    }

    public function campaigns(): HasMany
    {
        return $this->hasMany(Campaign::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
