<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface PrioritiesRepositoryContract
{
    public function findAll(): Collection;
}
