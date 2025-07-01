<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;

class Workflows extends AbstractApi
{
    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function create(array $payload): array
    {
        return $this->request('post', '/workflows', $payload);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function list(array $filters = []): array
    {
        // filters: active, tags, name, projectId, excludePinnedData, limit, cursor
        return $this->request('get', '/workflows', $filters);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function get(string $id, bool $excludePinnedData = false): array
    {
        return $this->request('get', "/workflows/{$id}", ['excludePinnedData' => $excludePinnedData]);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function update(string $id, array $payload): array
    {
        return $this->request('put', "/workflows/{$id}", $payload);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function delete(string $id): array
    {
        return $this->request('delete', "/workflows/{$id}");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function activate(string $id): array
    {
        return $this->request('post', "/workflows/{$id}/activate");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function deactivate(string $id): array
    {
        return $this->request('post', "/workflows/{$id}/deactivate");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function transfer(string $id, string $destinationProjectId): array
    {
        return $this->request('put', "/workflows/{$id}/transfer", [
            'destinationProjectId' => $destinationProjectId,
        ]);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function tags(string $id): array
    {
        return $this->request('get', "/workflows/{$id}/tags");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function updateTags(string $id, array $tagIds): array
    {
        return $this->request('put', "/workflows/{$id}/tags", $tagIds);
    }
}
