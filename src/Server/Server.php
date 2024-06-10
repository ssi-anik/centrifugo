<?php

namespace Anik\Centrifugo\Server;

final class Server
{
    public static function v3(string $apiKey): V3
    {
        return new V3($apiKey);
    }

    public static function v4(string $apiKey): V4
    {
        return new V4($apiKey);
    }

    public static function v5(string $apiKey): V5
    {
        return new V5($apiKey);
    }
}
