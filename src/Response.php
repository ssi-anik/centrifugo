<?php

namespace Anik\Centrifugo;

class Response
{
    protected string $raw;
    protected array $data;
    protected int $statusCode;

    public function __construct(string $body, int $statusCode)
    {
        $this->raw = $body;
        $parsed = json_decode($body, true);
        $this->data = json_last_error() === JSON_ERROR_NONE ? $parsed : [];
        $this->statusCode = $statusCode;
    }

    public function data(): array
    {
        return $this->data;
    }

    public function statusCode(): int
    {
        return $this->statusCode;
    }

    public function getRaw(): string
    {
        return $this->raw;
    }
}
