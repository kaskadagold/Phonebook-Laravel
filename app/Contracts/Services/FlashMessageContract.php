<?php

namespace App\Contracts\Services;

use Illuminate\Support\Collection;

interface FlashMessageContract
{
    public function success(string|array $messages): void;

    public function error(string|array $messages): void;

    public function successMessages(): Collection;

    public function errorMessages(): Collection;
}
