<?php

namespace Anik\Centrifugo\Methods\V5;

use Anik\Centrifugo\Methods\V4\PresenceStats as V4PresenceStats;

class PresenceStats extends V4PresenceStats
{
    public function endpoint(): string
    {
        return 'api/presence_stats';
    }

    public function body(): array
    {
        return $this->parameters();
    }
}
