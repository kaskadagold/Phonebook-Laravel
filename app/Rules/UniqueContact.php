<?php

namespace App\Rules;

use App\Repositories\ContactsRepository;
use App\Models\Contact;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueContact implements DataAwareRule, ValidationRule
{
    /**
     * All of the data under validation.
     *
     * @var array<string, mixed>
     */
    protected $data = [];

    /**
     * Set the data under validation.
     *
     * @param array<string, mixed> $data
     */
    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (app(ContactsRepository::class)->checkPresense($this->data['id'], $this->data['user_id'], $this->data['name'], $this->data['phone'])) {
            $fail('Контакт с таким именем и телефоном уже существует');
        }
    }
}
