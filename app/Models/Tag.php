<?php

namespace App\Models;

use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphedByMany;

#[Fillable(['society_id', 'name', 'color'])]
class Tag extends Model
{
    /** @use HasFactory<TagFactory> */
    use HasFactory;

    public function society(): BelongsTo
    {
        return $this->belongsTo(Society::class);
    }

    public function farmers(): MorphedByMany
    {
        return $this->morphedByMany(Farmer::class, 'taggable');
    }

    public function establishments(): MorphedByMany
    {
        return $this->morphedByMany(Establishment::class, 'taggable');
    }

    public function plots(): MorphedByMany
    {
        return $this->morphedByMany(Plot::class, 'taggable');
    }

    public function campaigns(): MorphedByMany
    {
        return $this->morphedByMany(Campaign::class, 'taggable');
    }
}
