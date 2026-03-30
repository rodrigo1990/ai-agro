<?php

namespace App\Models;

use Database\Factories\LaborTypeFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['description', 'work_order_type', 'category', 'active'])]
class LaborType extends Model
{
    /** @use HasFactory<LaborTypeFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }
}
