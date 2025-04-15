<?php

namespace App\Contracts\Repositories;

use App\DTO\ListFilterDTO;
use App\Models\Contact;
use Illuminate\Support\Collection;

interface ContactsRepositoryContract extends FlushCacheRepositoryContract
{
    public function getModel(): Contact;

    public function create(array $fields): Contact;

    public function update(Contact $contact, array $fields): Contact;

    public function delete(Contact $contact): void;

    public function getById(int $id, array $relations = []): Contact;

    public function checkPresense(?int $id, int $userId, string $name, string $phone): bool;

    public function findForList(int $userId, ListFilterDTO $listFilterDTO, array $fields = ['*'], array $relations = []): Collection;

    public function parsePhone(string $phone): string;
}
