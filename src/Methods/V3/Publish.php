<?php

namespace Anik\Centrifugo\Methods\V3;

use Anik\Centrifugo\Contracts\Method;

class Publish implements Method
{
    protected string $channel;
    protected array $data;
    protected ?bool $skipHistory = null;
    protected ?array $tags = null;

    public function __construct(string $channel, array $data)
    {
        $this->channel = $channel;
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
            'channel' => $this->channel,
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
            'method' => 'publish',
            'params' => $this->parameters(),
        ];
    }
}
