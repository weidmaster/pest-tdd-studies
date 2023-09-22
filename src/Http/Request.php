<?php

namespace App\Http;

class Request
{
    public static function create(
        string $method,
        string $uri,
        array $server,
        string $content
    ): self {
        return new self();
    }
}
