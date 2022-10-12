<?php

namespace Spatie\OpenTelemetry\Support;

use OpenTelemetry\SDK\Trace\RandomIdGenerator;

class Trace
{
    protected string $name = 'Laravel';

    public static function start(string $traceId = null): self
    {
        return new self($traceId);
    }

    public function __construct(protected ?string $id = null)
    {
        $this->id ??= (new RandomIdGenerator())->generateTraceId();
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
