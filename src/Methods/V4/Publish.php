<?php

namespace Anik\Centrifugo\Methods\V4;

use Anik\Centrifugo\Methods\V3\Publish as V3Publish;

class Publish extends V3Publish
{
    protected ?string $b64Data;

    public function b64Data(string $data): self
    {
        $this->b64Data = $data;

        return $this;
    }

    protected function parameters(): array
    {
        $params = parent::parameters();

        if (isset($this->b64Data)) {
            $params['b64data'] = $this->b64Data;
        }

        return $params;
    }
}
