<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\RolesRepositoryContract;
use App\Repositories\ContactsRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactsController extends Controller
{
    public function __construct(
        private readonly ContactsRepository $contactsRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $contacts = $this->contactsRepository->getContacts();
        return view('pages.home', ['contacts' => $contacts]);
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
    public function store(Request $request): RedirectResponse
    {
        $this->contactsRepository->create($request->only('name', 'phone'));

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
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->contactsRepository->update($id, $request->only('name', 'phone'));

        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->contactsRepository->delete($id);

        return redirect()->route('contact.index');
    }
}
