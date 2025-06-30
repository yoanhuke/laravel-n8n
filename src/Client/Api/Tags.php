<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;

class Tags extends AbstractApi
{
    /**
     * @throws ConnectionException
     */
    public function create(array $payload): array
    {
        return $this->request('post', '/tags', $payload);
    }

    /**
     * @throws ConnectionException
     */
    public function list(int $limit = 100, ?string $cursor = null): array
    {
        return $this->request('get', '/tags', array_filter([
            'limit' => $limit,
            'cursor' => $cursor,
        ]));
    }

    /**
     * @throws ConnectionException
     */
    public function get(string $id): array
    {
        return $this->request('get', "/tags/{$id}");
    }

    /**
     * @throws ConnectionException
     */
    public function update(string $id, array $payload): array
    {
        return $this->request('put', "/tags/{$id}", $payload);
    }

    /**
     * @throws ConnectionException
     */
    public function delete(string $id): array
    {
        return $this->request('delete', "/tags/{$id}");
    }
}
