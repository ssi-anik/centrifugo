<?php

namespace Anik\Centrifugo\Methods\V5;

use Anik\Centrifugo\Methods\V4\Presence as V4Presence;

class Presence extends V4Presence
{
    public function endpoint(): string
    {
        return 'api/presence';
    }

    public function body(): array
    {
        return $this->parameters();
    }
}
