<?php

namespace App\Contracts\Repositories;

interface RolesRepositoryContract
{
    public function userIsAdmin(int $userId): bool;
}
