<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;

class SourceControl extends AbstractApi
{
    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function pull(array $payload): array
    {
        return $this->request('post', '/source-control/pull', $payload);
    }
}
