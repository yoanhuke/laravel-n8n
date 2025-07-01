<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;

class Credentials extends AbstractApi
{
    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function create(array $payload): array
    {
        return $this->request('post', '/credentials', $payload);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function list(int $limit = 100, ?string $cursor = null): array
    {
        return $this->request('get', '/credentials', array_filter([
            'limit' => $limit,
            'cursor' => $cursor,
        ]));
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function get(string $id): array
    {
        return $this->request('get', "/credentials/{$id}");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function delete(string $id): array
    {
        return $this->request('delete', "/credentials/{$id}");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function schema(string $typeName): array
    {
        return $this->request('get', "/credentials/schema/{$typeName}");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function transfer(string $id, string $destinationProjectId): array
    {
        return $this->request('put', "/credentials/{$id}/transfer", [
            'destinationProjectId' => $destinationProjectId,
        ]);
    }
}
