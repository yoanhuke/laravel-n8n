<?php

namespace Tests;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use KayedSpace\N8n\N8nServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            N8nServiceProvider::class,
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        // Set up default config values
        Config::set('n8n.api.base_url', 'http://localhost:5678/api/v1');
        Config::set('n8n.api.key', 'test-api-key');
        Config::set('n8n.timeout', 30);
        Config::set('n8n.throw', true);
        Config::set('n8n.retry', 3);

        // Set fake basic auth credentials for webhooks
        Config::set('n8n.webhook.username', 'test-user');
        Config::set('n8n.webhook.password', 'test-pass');
        Config::set('n8n.webhook.base_url', 'http://localhost:5678/webhook');

        Http::preventStrayRequests();
    }
}
