<?php

namespace Anik\Centrifugo\Contracts;

interface AuthorizationResolver
{
    public function authorizationHeader(): array;
}
