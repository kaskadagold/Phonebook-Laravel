<?php

namespace App\Contracts\Repositories;

use App\DTO\ListFilterDTO;
use App\Models\Contact;
use Illuminate\Support\Collection;

interface ContactsRepositoryContract
{
    public function getModel(): Contact;

    public function getContacts(int $userId): Collection;

    public function create(array $fields): Contact;

    public function update(int $id, array $fields): Contact;

    public function delete(int $id): void;

    public function getById(int $id): Contact;

    public function checkPresense(?int $id, int $userId, string $name, string $phone): bool;

    public function findForList(int $userId, ListFilterDTO $listFilterDTO, array $fields = ['*']): Collection;

    public function parsePhone(string $phone): string;
}
