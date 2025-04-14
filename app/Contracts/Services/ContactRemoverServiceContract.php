<?php

namespace App\Contracts\Services;

interface ContactRemoverServiceContract
{
    public function delete(int $id): void;
}
