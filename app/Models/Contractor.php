<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'phone', 'address', 'email', 'own', 'active'])]
class Contractor extends Model
{
    protected function casts(): array
    {
        return [
            'own'    => 'boolean',
            'active' => 'boolean',
        ];
    }
}
