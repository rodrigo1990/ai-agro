<?php

namespace App\Models;

use Database\Factories\ContractorFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'phone', 'address', 'email', 'own', 'active'])]
class Contractor extends Model
{
    /** @use HasFactory<ContractorFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'own'    => 'boolean',
            'active' => 'boolean',
        ];
    }
}
