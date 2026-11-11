<?php

declare(strict_types=1);

namespace Sendpulse\RestApi;

/**
 * Chained accessor over the operation map.
 *
 * Property access extends the dotted operation key, a method call dispatches it:
 *
 *     $client->crm->contacts->get(['id' => 1])  ->  key "crm.contacts.get"
 */
final class Resource
{
    public function __construct(
        private readonly Client $client,
        private readonly string $prefix,
    ) {
    }

    public function __get(string $name): self
    {
        return new self($this->client, $this->prefix . '.' . $name);
    }

    /**
     * @param array<int, array<string, mixed>> $arguments
     * @return array<mixed>
     */
    public function __call(string $name, array $arguments): array
    {
        /** @var array<string, mixed> $params */
        $params = $arguments[0] ?? [];

        return $this->client->callOperation($this->prefix . '.' . $name, $params);
    }
}
