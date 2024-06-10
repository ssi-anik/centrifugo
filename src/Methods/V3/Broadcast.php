<?php

namespace Anik\Centrifugo\Methods\V3;

use Anik\Centrifugo\Contracts\Method;

class Broadcast implements Method
{
    protected array $channels;
    protected array $data;
    protected ?bool $skipHistory = null;
    protected ?array $tags = null;

    public function __construct(array $channels, array $data)
    {
        $this->channels = $channels;
        $this->data = $data;
    }

    public function endpoint(): string
    {
        return 'api';
    }

    public function skipHistory(bool $skipHistory): self
    {
        $this->skipHistory = $skipHistory;

        return $this;
    }

    public function tags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    protected function parameters(): array
    {
        $params = [
            'channels' => $this->channels,
            'data' => $this->data,
        ];

        if (isset($this->skipHistory)) {
            $params['skip_history'] = $this->skipHistory;
        }

        if (isset($this->tags)) {
            $params['tags'] = $this->tags;
        }

        return $params;
    }

    public function body(): array
    {
        return [
            'method' => 'broadcast',
            'params' => $this->parameters(),
        ];
    }
}
