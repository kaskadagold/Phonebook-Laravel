<?php

namespace App\Repositories;

use App\Contracts\Repositories\PrioritiesRepositoryContract;
use App\Models\Priority;
use Illuminate\Support\Collection;

class PrioritiesRepository implements PrioritiesRepositoryContract
{
    public function __construct(private readonly Priority $model)
    {
    }

    private function getModel(): Priority
    {
        return clone $this->model;
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }
}
