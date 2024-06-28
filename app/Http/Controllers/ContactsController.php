<?php

namespace App\Http\Controllers;

use App\Contracts\Services\FlashMessageContract;
use App\Repositories\ContactsRepository;
use App\Contracts\Repositories\ContactsRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Rules\UniqueContact;
use App\DTO\ListFilterDTO;


class ContactsController extends Controller
{
    public function __construct(
        private readonly ContactsRepositoryContract $contactsRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(
        Request $request,
    ): View
    {
        $contacts = collect();
        $listFilterDTO = new ListFilterDTO();
        if ($userId = $this->getUserId()) {
            // $contacts = $this->contactsRepository->getContacts($userId);

            $listFilterDTO = $listFilterDTO->setModel($request->get('model'))
                ->setOrderName($request->get('order_name'))
                ->setOrderPriority($request->get('order_priority'))
            ;
            $contacts = $this->contactsRepository->findForList($userId, $listFilterDTO);
        }
    
        return view('pages.home', ['contacts' => $contacts, 'filterValues' => $listFilterDTO]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.create', ['contact' => $this->contactsRepository->getModel()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        Request $request,
        FlashMessageContract $flashMessage,
    ): RedirectResponse {
        $fields = ($request->merge(['id' => null, 'user_id' => $this->getUserId()]))
                    ->validate($this->getValidationRules());
        $this->passedValidation($fields);

        $this->contactsRepository->create($fields);

        $flashMessage->success('Новый контакт успешно добавлен');

        return redirect()->route('contact.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $contact = $this->contactsRepository->getById($id);

        return view('pages.update', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        int $id,
        FlashMessageContract $flashMessage,
    ): RedirectResponse {
        $fields = ($request->merge(['id' => $id, 'user_id' => $this->getUserId()]))
                    ->validate($this->getValidationRules());
        $this->passedValidation($fields);

        $this->contactsRepository->update($id, $fields);

        $flashMessage->success('Контакт успешно обновлен');

        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        int $id,
        FlashMessageContract $flashMessage,
    ): RedirectResponse {
        $this->contactsRepository->delete($id);

        $flashMessage->success('Контакт успешно удален');

        return redirect()->route('contact.index');
    }

    private function getUserId(): ?int
    {
        return auth()->user()?->id;
    }

    private function getValidationRules(): array
    {
        return [
            'user_id' => ['required', 'int'],
            'name' => [
                'required',
                'string',
                new UniqueContact(),
            ],
            'phone' => [
                'required',
                'string',
                'regex:/^[\+][7][-][0-9]{3}[-][0-9]{3}[-][0-9]{2}[-][0-9]{2}$/',
            ],
        ];
    }

    private function passedValidation(array $fields): array
    {
        $fields['phone'] = $this->contactsRepository->parsePhone($fields['phone']);
        return $fields;
    }
}
