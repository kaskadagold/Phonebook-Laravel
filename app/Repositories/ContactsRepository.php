<?php

namespace App\Repositories;

use App\Contracts\Repositories\ContactsRepositoryContract;
use App\Models\Contact;
use App\Models\Priority;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Collection;
use App\DTO\ListFilterDTO;
use Illuminate\Support\Facades\Cache;

class ContactsRepository implements ContactsRepositoryContract
{
    use FlushesCache;

    public function __construct(private readonly Contact $model)
    {
    }

    protected function cacheTags(): array
    {
        return ['contacts'];
    }

    public function create(array $fields): Contact
    {
        return $this->getModel()->create($fields);
    }

    public function update(Contact $contact, array $fields): Contact
    {
        $contact->update($fields);

        return $contact;
    }

    public function delete(Contact $contact): void
    {
        $contact->delete();
    }

    public function getById(int $id, array $relations = []): Contact
    {
        return Cache::tags(['contacts', 'images', 'priorities'])->remember(
            sprintf('contactById|%s|%s', $id,implode('|', $relations)),
            3600,
            fn () => $this->getModel()
                ->when($relations, fn ($query) => $query->with($relations))
                ->findOrFail($id)
        );
    }

    public function checkPresense(?int $id, int $userId, string $name, string $phone): bool
    {
        $query = $this->getModel()
            ->where([
                ['user_id', '=', $userId],
                ['name', '=', $name],
                ['phone', '=', $phone],
            ])
        ;

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
        array $relations = [],
    ): Collection {
        return Cache::tags(['contacts', 'images', 'priorities'])->remember(
            sprintf(
                'contactsForList|%s',
                serialize([
                    'userId' => $userId,
                    'filter' => $listFilterDTO,
                    'fields' => $fields,
                    'relations' => $relations,
                ])
            ),
            3600,
            fn () => $this->listQuery($listFilterDTO, $userId)
                ->when($relations, fn ($query) => $query->with($relations))
                ->get($fields)
        );
    }

    public function parsePhone(string $phone): string
    {
        return str_replace(['+', '-'], '', $phone);
    }

    private function listQuery(ListFilterDTO $listFilterDTO, int $userId): Builder
    {
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
        ;
    }
}
