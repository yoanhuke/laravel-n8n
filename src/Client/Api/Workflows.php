<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use KayedSpace\N8n\Enums\RequestMethod;

class Workflows extends AbstractApi
{
    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function create(array $payload): array
    {
        return $this->request(RequestMethod::Post, '/workflows', $payload);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function list(array $filters = []): array
    {
        // filters: active, tags, name, projectId, excludePinnedData, limit, cursor
        return $this->request(RequestMethod::Get, '/workflows', $filters);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function get(string $id, bool $excludePinnedData = false): array
    {
        return $this->request(RequestMethod::Get, "/workflows/{$id}", ['excludePinnedData' => $excludePinnedData]);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function update(string $id, array $payload): array
    {
        return $this->request(RequestMethod::Put, "/workflows/{$id}", $payload);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function delete(string $id): array
    {
        return $this->request(RequestMethod::Delete, "/workflows/{$id}");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function activate(string $id): array
    {
        return $this->request(RequestMethod::Post, "/workflows/{$id}/activate");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function deactivate(string $id): array
    {
        return $this->request(RequestMethod::Post, "/workflows/{$id}/deactivate");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function transfer(string $id, string $destinationProjectId): array
    {
        return $this->request(RequestMethod::Put, "/workflows/{$id}/transfer", [
            'destinationProjectId' => $destinationProjectId,
        ]);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function tags(string $id): array
    {
        return $this->request(RequestMethod::Get, "/workflows/{$id}/tags");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function updateTags(string $id, array $tagIds): array
    {
        return $this->request(RequestMethod::Put, "/workflows/{$id}/tags", $tagIds);
    }
}
