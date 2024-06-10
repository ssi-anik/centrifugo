<?php

namespace Anik\Centrifugo\Server;

use Anik\Centrifugo\Contracts\AuthorizationResolver;

class V3 implements AuthorizationResolver
{
    protected string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function authorizationHeader(): array
    {
        return ['Authorization' => sprintf('apikey %s', $this->apiKey)];
    }
}
