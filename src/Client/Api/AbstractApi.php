<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Config;

abstract class AbstractApi
{

    public function __construct(protected PendingRequest $httpClient)
    {
        $baseUrl = Config::get('n8n.api.base_url');
        $key = Config::get('n8n.api.key');
        $this->httpClient = $httpClient->baseUrl($baseUrl)->withHeaders([
            'X-N8N-API-KEY' => $key,
            'Accept' => 'application/json',
        ]);
    }

    /**
     * Proxy HTTP calls through the root client.
     * @throws ConnectionException
     * @throws RequestException
     */
    protected function request(string $method, string $uri, array $data = []): array
    {

        return $this->httpClient
            ->{$method}($uri, $data)
            ->json();
    }
}
