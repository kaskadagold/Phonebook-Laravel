<?php

namespace App\Services;

use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\MessageLimiterContract;
use Illuminate\Session\Store;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Collection;

class FlashMessage implements FlashMessageContract
{
    public function __construct(
        private readonly MessageLimiterContract $messageLimiter,
        private readonly SessionManager | Store $store,
    ) {
    }

    public function success(string|array $message): void
    {
        $this->flash('success_messages', collect((array) $message));
    }

    public function error(string|array $message): void
    {
        $this->flash('error_messages', collect((array) $message));
    }

    public function successMessages(): Collection
    {
        return $this->store->get('success_messages', collect());
    }

    public function errorMessages(): Collection
    {
        return $this->store->get('error_messages', collect());
    }

    private function flash(string $type, Collection $messages): void
    {
        $this->store->flash($type, $messages->map(fn ($message) => $this->messageLimiter->limit($message)));
    }
}
