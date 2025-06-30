<?php

namespace KayedSpace\N8n\Client\Api;

use KayedSpace\N8n\Client\N8nClient;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Response;

abstract class AbstractApi
{
    protected N8nClient $client;

    public function __construct(N8nClient $client)
    {
        $this->client = $client;
    }

    /**
     * Proxy HTTP calls through the root client.
     * @throws ConnectionException
     */
    protected function request(string $method, string $uri, array $data = []): array
    {
        return $this->client->apiRequest($method, $uri, $data);
    }
}
