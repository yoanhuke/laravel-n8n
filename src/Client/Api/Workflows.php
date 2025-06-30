<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;

class Workflows extends AbstractApi
{
    /**
     * @throws ConnectionException
     */
    public function create(array $payload): array
    {
        return $this->request('post', '/workflows', $payload);
    }

    /**
     * @throws ConnectionException
     */
    public function list(array $filters = []): array
    {
        // filters: active, tags, name, projectId, excludePinnedData, limit, cursor
        return $this->request('get', '/workflows', $filters);
    }

    /**
     * @throws ConnectionException
     */
    public function get(string $id, bool $excludePinnedData = false): array
    {
        return $this->request('get', "/workflows/{$id}", ['excludePinnedData' => $excludePinnedData]);
    }

    /**
     * @throws ConnectionException
     */
    public function update(string $id, array $payload): array
    {
        return $this->request('put', "/workflows/{$id}", $payload);
    }

    /**
     * @throws ConnectionException
     */
    public function delete(string $id): array
    {
        return $this->request('delete', "/workflows/{$id}");
    }

    /**
     * @throws ConnectionException
     */
    public function activate(string $id): array
    {
        return $this->request('post', "/workflows/{$id}/activate");
    }

    /**
     * @throws ConnectionException
     */
    public function deactivate(string $id): array
    {
        return $this->request('post', "/workflows/{$id}/deactivate");
    }

    /**
     * @throws ConnectionException
     */
    public function transfer(string $id, string $destinationProjectId): array
    {
        return $this->request('put', "/workflows/{$id}/transfer", [
            'destinationProjectId' => $destinationProjectId,
        ]);
    }

    /**
     * @throws ConnectionException
     */
    public function tags(string $id): array
    {
        return $this->request('get', "/workflows/{$id}/tags");
    }

    /**
     * @throws ConnectionException
     */
    public function updateTags(string $id, array $tagIds): array
    {
        return $this->request('put', "/workflows/{$id}/tags", $tagIds);
    }

}
