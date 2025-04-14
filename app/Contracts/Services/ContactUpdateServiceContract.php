<?php

namespace App\Contracts\Services;

use App\Models\Contact;

interface ContactUpdateServiceContract
{
    public function update(int $id, array $fields): Contact;
}
