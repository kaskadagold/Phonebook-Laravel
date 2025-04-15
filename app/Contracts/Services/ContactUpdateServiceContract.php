<?php

namespace App\Contracts\Services;

use App\Models\Contact;

interface ContactUpdateServiceContract
{
    public function update(Contact $contact, array $fields): Contact;
}
