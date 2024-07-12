<?php

namespace App\Repositories;
use App\Contracts\Repositories\RolesRepositoryContract;
use App\Models\Role;
use Illuminate\Contracts\Database\Eloquent\Builder;

class RolesRepository implements RolesRepositoryContract
{
    public function __construct(private readonly Role $model)
    {
    }

    private function getModel(): Role
    {
        return clone $this->model;
    }

    public function userIsAdmin(int $userId): bool
    {
        return $this->hasRole($userId, 'admin');
    }

    public function hasRole(int $userId, string $role): bool
    {
        return $this->getModel()
            ->whereHas('users', fn (Builder $query) => $query->where('id', $userId))
            ->where('name', $role)
            ->exists()
        ;
    }

    public function getAdminId(): int
    {
        return $this->getModel()
            ->with('users')
            ->where('name', 'admin')
            ->limit(1)
            ->value('id')
        ;
    }


}
