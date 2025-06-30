<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;

class SourceControl extends AbstractApi
{
    /**
     * @throws ConnectionException
     */
    public function pull(array $payload): array
    {
        return $this->request('post', '/source-control/pull', $payload);
    }
}
