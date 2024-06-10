<?php

namespace Anik\Centrifugo;

use Anik\Centrifugo\Contracts\AuthorizationResolver;
use Anik\Centrifugo\Contracts\Method;
use GuzzleHttp\Client;

class ServerApi
{
    protected Client $httpClient;
    protected AuthorizationResolver $authorizationResolver;

    public function __construct(
        Client $httpClient,
        AuthorizationResolver $authorizationResolver
    ) {
        $this->httpClient = $httpClient;
        $this->authorizationResolver = $authorizationResolver;
    }

    public function operation(Method $method): Response
    {
        $response = $this->httpClient->post($method->endpoint(), [
            'headers' => $this->authorizationResolver->authorizationHeader() + ['Content-Type' => 'application/json',],
            'body' => json_encode($method->body()),
        ]);

        return new Response((string) $response->getBody(), $response->getStatusCode());
    }
}
