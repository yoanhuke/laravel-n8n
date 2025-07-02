<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use KayedSpace\N8n\Enums\RequestMethod;

class Variables extends AbstractApi
{
    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function create(array $payload): array
    {
        return $this->request(RequestMethod::Post, '/variables', $payload);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function list(int $limit = 100, ?string $cursor = null): array
    {
        return $this->request(RequestMethod::Get, '/variables', array_filter([
            'limit' => $limit,
            'cursor' => $cursor,
        ]));
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function delete(string $id): void
    {
        $this->request(RequestMethod::Delete, "/variables/{$id}"); // 204
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function update(string $id, array $payload): void
    {
        $this->request(RequestMethod::Put, "/variables/{$id}", $payload); // 204
    }
}
