<?php

namespace App\Repositories;

use App\Contracts\Repositories\ContactsRepositoryContract;
use App\Models\Contact;
use App\Models\Priority;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Collection;
use App\DTO\ListFilterDTO;

class ContactsRepository implements ContactsRepositoryContract
{
    public function __construct(private readonly Contact $model)
    {
    }
    
    public function getContacts(int $userId): Collection
    {
        return $this->getModel()
            ->where('user_id', $userId)
            ->get()
        ;
    }

    public function create(array $fields): Contact
    {
        return $this->getModel()->create($fields);
    }

    public function update(int $id, array $fields): Contact
    {
        $contact = $this->getById($id);
        $contact->update($fields);

        return $contact;
    }

    public function delete(int $id): void
    {
        $this->getModel()->where('id', $id)->delete();
    }

    public function getById(int $id): Contact
    {
        return $this->getModel()
            ->where('id', $id)
            ->first()
        ;
    }

    public function checkPresense(?int $id, int $userId, string $name, string $phone): bool
    {
        $query = $this->getModel()
            ->where([
                ['user_id', '=', $userId],
                ['name', '=', $name],
                ['phone', '=', $phone],
            ]);

        if ($id !== null) {
            $query = $query->where('id', '!=', $id);
        }

        return $query->exists();
    }

    public function getModel(): Contact
    {
        return clone $this->model;
    }

    public function findForList(
        int $userId,
        ListFilterDTO $listFilterDTO,
        array $fields = ['contacts.*'],  
    ): Collection {
        return $this->getModel()
            ->when($listFilterDTO->getModel() !== null, fn ($query) => 
                $query->where(fn ($query) =>
                    $query->where('contacts.name', 'like', '%' . $listFilterDTO->getModel() . '%')
                        ->orWhere('contacts.phone', 'like', '%' . $this->parsePhone($listFilterDTO->getModel()) . '%')
                )
            )
            ->when($listFilterDTO->getOrderPriority() !== null, fn ($query) => 
                $query->leftJoin('priorities', 'priorities.id', '=', 'contacts.priority_id')
                    ->orderBy('priorities.level', $listFilterDTO->getOrderPriority())
            )
            ->when($listFilterDTO->getOrderName() !== null, fn ($query) => $query->orderBy('contacts.name', $listFilterDTO->getOrderName()))
            ->where('contacts.user_id', '=', $userId)
            ->get($fields)
        ;
    }

    public function parsePhone(string $phone): string
    {
        return str_replace(['+', '-'], '', $phone);
    }
}
