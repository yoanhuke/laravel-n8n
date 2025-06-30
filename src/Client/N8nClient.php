<?php

namespace KayedSpace\N8n\Client;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use KayedSpace\N8n\Client\Api\Audit;
use KayedSpace\N8n\Client\Api\Executions;
use KayedSpace\N8n\Client\Api\Projects;
use KayedSpace\N8n\Client\Api\SourceControl;
use KayedSpace\N8n\Client\Api\Tags;
use KayedSpace\N8n\Client\Api\Users;
use KayedSpace\N8n\Client\Api\Variables;
use KayedSpace\N8n\Client\Api\Workflows;
use KayedSpace\N8n\Client\Webhook\Webhooks;

class N8nClient
{
    protected PendingRequest $httpClient;

    public function __construct()
    {

        $timeout = Config::get('n8n.timeout');
        $throw = Config::get('n8n.throw');
        $retry = Config::get('n8n.retry');
        $this->httpClient = Http::when($timeout, fn($request) => $request->timeout($timeout))
            ->when($throw, fn($request) => $request->throwIf($throw))
            ->when($retry, fn($request) => $request->retry($retry));

    }

    /**
     * @throws ConnectionException
     */
    public function apiRequest(string $method, string $uri, array $data = []): array
    {
        $baseUrl = Config::get('n8n.api.base_url');
        $key = Config::get('n8n.api.key');

        return $this->httpClient
            ->baseUrl($baseUrl)
            ->withHeaders([
                'X-N8N-API-KEY' => $key,
                'Accept' => 'application/json',
            ])
            ->{$method}($uri, $data)
            ->json();
    }

    /**
     * @throws ConnectionException
     */
    public function webhookRequest(string $method, string $uri, array $data = []): ?array
    {
        $baseUrl = Config::get('n8n.webhook.base_url');
        $username = Config::get('n8n.webhook.username');
        $password = Config::get('n8n.webhook.password');

        return $this->httpClient
            ->baseUrl($baseUrl)
            ->when($username && $password, fn($request) => $request->withBasicAuth($username, $password))
            ->{$method}($uri, $data)
            ->json();
    }

    public function webhooks($method = 'post'): Webhooks
    {
        return new Webhooks($this, $method);
    }

    public function audit(): Audit
    {
        return new Audit($this);
    }

    public function credentials(): Api\Credentials
    {
        return new Api\Credentials($this);
    }

    public function executions(): Executions
    {
        return new Executions($this);
    }

    public function workflows(): Workflows
    {
        return new Workflows($this);
    }

    public function tags(): Tags
    {
        return new Tags($this);
    }

    public function users(): Users
    {
        return new Users($this);
    }

    public function variables(): Variables
    {
        return new Variables($this);
    }

    public function projects(): Projects
    {
        return new Projects($this);
    }

    public function sourceControl(): SourceControl
    {
        return new SourceControl($this);
    }
}
