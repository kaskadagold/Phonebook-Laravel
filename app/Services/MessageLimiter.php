<?php

namespace App\Services;

use App\Contracts\Services\MessageLimiterContract;
use Illuminate\Support\Str;

class MessageLimiter implements MessageLimiterContract
{
    public function limit(string $message, int $limit = 50, string $end = '...'): string
    {
        return Str::limit($message, $limit, $end);
    }
}
