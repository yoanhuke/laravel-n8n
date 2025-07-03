<?php

use KayedSpace\N8n\Client\N8nClient;
use KayedSpace\N8n\N8nServiceProvider;

beforeEach(fn () => $this->app->register(N8nServiceProvider::class));

test('the "n8n" binding resolves to N8nClient', function () {
    expect(app('n8n'))->toBeInstanceOf(N8nClient::class);
});
