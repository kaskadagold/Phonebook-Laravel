<?php

namespace App\View\Components\Forms\ConcreteFormsFields;

use App\Contracts\Repositories\PrioritiesRepositoryContract;
use App\Models\Contact;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactFormFields extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly Contact $contact,
        private readonly PrioritiesRepositoryContract $prioritiesRepository,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $priorities = $this->prioritiesRepository->findAll();

        return view('components.forms.concrete-forms-fields.contact-form-fields', ['priorities' => $priorities]);
    }
}
