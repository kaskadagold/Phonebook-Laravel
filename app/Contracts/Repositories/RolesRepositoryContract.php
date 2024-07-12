<?php

namespace App\Contracts\Repositories;

interface RolesRepositoryContract
{
    public function userIsAdmin(int $userId): bool;

    public function hasRole(int $userId, string $role): bool;

    public function getAdminId(): int;
}
