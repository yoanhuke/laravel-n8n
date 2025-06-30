<?php

namespace KayedSpace\N8n\Client\Api;

class Credentials extends AbstractApi
{
    public function create(array $payload): array
    {
        return $this->request('post', '/credentials', $payload);
    }

    public function list(int $limit = 100, ?string $cursor = null): array
    {
        return $this->request('get', '/credentials', array_filter([
            'limit' => $limit,
            'cursor' => $cursor,
        ]));
    }

    public function get(string $id): array
    {
        return $this->request('get', "/credentials/{$id}");
    }

    public function delete(string $id): array
    {
        return $this->request('delete', "/credentials/{$id}");
    }

    public function schema(string $typeName): array
    {
        return $this->request('get', "/credentials/schema/{$typeName}");
    }

    public function transfer(string $id, string $destinationProjectId): array
    {
        return $this->request('put', "/credentials/{$id}/transfer", [
            'destinationProjectId' => $destinationProjectId,
        ]);
    }
}
