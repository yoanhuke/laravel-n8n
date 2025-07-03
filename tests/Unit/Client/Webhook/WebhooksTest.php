<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use KayedSpace\N8n\Facades\N8nClient;

it('send webhook request', function () {
    $url = Config::get('n8n.webhook.base_url');

    Http::fake(fn () => Http::response(['ok' => true], 200));

    N8nClient::webhooks()->request('/path-to-your-webhook');

    Http::assertSent(fn (Request $req) => "$url/path-to-your-webhook" === $req->url());
});
