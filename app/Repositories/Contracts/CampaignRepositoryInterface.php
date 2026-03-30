<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CampaignRepositoryInterface
{
    public function getAll(): Collection;
}
