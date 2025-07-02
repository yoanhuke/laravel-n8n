<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use KayedSpace\N8n\Enums\RequestMethod;

class Credentials extends AbstractApi
{
    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function create(array $payload): array
    {
        return $this->request(RequestMethod::Post, '/credentials', $payload);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function list(int $limit = 100, ?string $cursor = null): array
    {
        return $this->request(RequestMethod::Get, '/credentials', array_filter([
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
        return $this->request(RequestMethod::Get, "/credentials/{$id}");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function delete(string $id): array
    {
        return $this->request(RequestMethod::Delete, "/credentials/{$id}");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function schema(string $typeName): array
    {
        return $this->request(RequestMethod::Get, "/credentials/schema/{$typeName}");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function transfer(string $id, string $destinationProjectId): array
    {
        return $this->request(RequestMethod::Put, "/credentials/{$id}/transfer", [
            'destinationProjectId' => $destinationProjectId,
        ]);
    }
}
