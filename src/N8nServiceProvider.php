<?php

namespace KayedSpace\N8n;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use KayedSpace\N8n\Client\N8nClient;

class N8nServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/n8n.php', 'n8n');
        $this->app->bind('n8n', fn ($app) => new N8nClient);
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/n8n.php' => $this->app->configPath('n8n.php'),
        ], 'n8n-config');
    }
}
