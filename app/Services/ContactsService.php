<?php

namespace App\Services;

use App\Contracts\Repositories\ContactsRepositoryContract;
use App\Contracts\Services\ContactCreationServiceContract;
use App\Contracts\Services\ContactRemoverServiceContract;
use App\Contracts\Services\ContactUpdateServiceContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Models\Contact;

class ContactsService implements ContactCreationServiceContract,
    ContactUpdateServiceContract, ContactRemoverServiceContract
{
    public function __construct(
        private readonly ContactsRepositoryContract $contactsRepository,
        private readonly ImagesServiceContract $imagesService,
    ) {}

    public function create(array $fields): Contact
    {
        if (! empty($fields['image'])) {
            $image = $this->imagesService->createFile($fields['image']);
            $fields['image_id'] = $image->id;
        }

        $this->contactsRepository->flushCache();

        return $this->contactsRepository->create($fields);
    }

    public function update(int $id, array $fields): Contact
    {
        $contact = $this->contactsRepository->getById($id);
        $oldImageId = null;

        if (! empty($fields['image'])) {
            $image = $this->imagesService->createFile($fields['image']);
            $fields['image_id'] = $image->id;
            $oldImageId = $contact->image_id;
        }

        $this->contactsRepository->update($contact, $fields);

        if ($oldImageId !== null) {
            $this->imagesService->deleteFile($oldImageId);
        }

        $this->contactsRepository->flushCache();

        return $contact;
    }

    public function delete(int $id): void
    {
        $contact = $this->contactsRepository->getById($id);

        if (! empty($contact->image_id)) {
            $this->imagesService->deleteFile($contact->image_id);
        }

        $this->contactsRepository->delete($id);

        $this->contactsRepository->flushCache();
    }
}
