<?php

namespace App\Contracts\Services;

use App\Models\Contact;

interface ContactRemoverServiceContract
{
    public function delete(Contact $contact): void;
}
