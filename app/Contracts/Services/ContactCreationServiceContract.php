<?php

namespace App\Contracts\Services;

use App\Models\Contact;

interface ContactCreationServiceContract
{
    public function create(array $fields): Contact;
}
