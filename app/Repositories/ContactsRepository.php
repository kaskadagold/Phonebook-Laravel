<?php

namespace App\Repositories;
use App\Models\Contact;
use Illuminate\Support\Collection;

class ContactsRepository
{
    public function __construct(private readonly Contact $model)
    {
    }
    
    public function getContacts(): Collection
    {
        return $this->getModel()
            ->where('user_id', $this->getUserId())
            ->get()
        ;
    }

    public function create(array $fields): Contact
    {
        $finalFields = array_merge(['user_id' => $this->getUserId()], $fields);
        return $this->getModel()->create($finalFields);
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

    public function checkPresense(int $userId, string $name, string $phone): bool
    {
        return $this->getModel()
            ->where([
                ['user_id', '=', $userId],
                ['name', '=', $name],
                ['phone', '=', $phone],
            ])
            ->exists()
        ;
    }

    public function getModel(): Contact
    {
        return $this->model;
    }

    private function getUserId(): ?int
    {
        return auth()->user()?->id;
    }
}
