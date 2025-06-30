<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;

class Variables extends AbstractApi
{
    /**
     * @throws ConnectionException
     */
    public function create(array $payload): array
    {
        return $this->request('post', '/variables', $payload);
    }

    /**
     * @throws ConnectionException
     */
    public function list(int $limit = 100, ?string $cursor = null): array
    {
        return $this->request('get', '/variables', array_filter([
            'limit' => $limit,
            'cursor' => $cursor,
        ]));
    }

    /**
     * @throws ConnectionException
     */
    public function delete(string $id): void
    {
        $this->request('delete', "/variables/{$id}"); // 204
    }

    /**
     * @throws ConnectionException
     */
    public function update(string $id, array $payload): void
    {
        $this->request('put', "/variables/{$id}", $payload); // 204
    }
}
