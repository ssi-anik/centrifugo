<?php

namespace Anik\Centrifugo\Methods\V5;

use Anik\Centrifugo\Methods\V4\Broadcast as V4Broadcast;

class Broadcast extends V4Broadcast
{
    protected ?string $idempotencyKey;
    protected ?bool $delta;

    public function idempotencyKey(string $key): self
    {
        $this->idempotencyKey = $key;

        return $this;
    }

    public function delta(bool $delta): self
    {
        $this->delta = $delta;

        return $this;
    }

    protected function parameters(): array
    {
        $params = parent::parameters();

        if (isset($this->idempotencyKey)) {
            $params['idempotency_key'] = $this->idempotencyKey;
        }

        if (isset($this->delta)) {
            $params['delta'] = $this->delta;
        }

        return $params;
    }

    public function endpoint(): string
    {
        return 'api/broadcast';
    }

    public function body(): array
    {
        return $this->parameters();
    }
}
