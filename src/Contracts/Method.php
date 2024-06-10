<?php

namespace Anik\Centrifugo\Contracts;

interface Method
{
    public function endpoint(): string;

    public function body(): array;
}
