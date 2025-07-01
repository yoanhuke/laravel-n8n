<?php

namespace KayedSpace\N8n\Client\Webhook;

use KayedSpace\N8n\Client\N8nClient;
use Illuminate\Http\Client\ConnectionException;

class Webhooks
{
    protected string $method = 'get';

    private N8nClient $client;

    public function __construct(N8nClient $client, string $method)
    {
        $this->client = $client;
        $this->method = strtolower($method);
    }

    /**
     * @throws ConnectionException
     */
    public function request($path, array $data = []): ?array
    {
        return $this->client->webhookRequest($this->method, $path, $data);
    }
}
