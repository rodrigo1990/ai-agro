<?php

namespace App\Services;

use App\Repositories\Contracts\CampaignRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CampaignService
{
    public function __construct(
        private readonly CampaignRepositoryInterface $repository,
    ) {}

    public function getAllCampaigns(): Collection
    {
        return $this->repository->getAll();
    }
}
