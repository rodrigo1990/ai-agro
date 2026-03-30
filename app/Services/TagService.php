<?php

namespace App\Services;

use App\Repositories\Contracts\TagRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TagService
{
    public function __construct(
        private readonly TagRepositoryInterface $repository,
    ) {}

    public function getAllTags(): Collection
    {
        return $this->repository->getAll();
    }
}
