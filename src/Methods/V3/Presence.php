<?php

namespace Anik\Centrifugo\Methods\V3;

use Anik\Centrifugo\Contracts\Method;

class Presence implements Method
{
    protected string $channel;

    public function __construct(string $channel)
    {
        $this->channel = $channel;
    }

    public function endpoint(): string
    {
        return 'api';
    }

    protected function parameters(): array
    {
        return [
            'channel' => $this->channel,
        ];
    }

    public function body(): array
    {
        return [
            'method' => 'presence',
            'params' => $this->parameters(),
        ];
    }
}
