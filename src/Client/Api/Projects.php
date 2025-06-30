<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;

class Projects extends AbstractApi
{
    /**
     * @throws ConnectionException
     */
    public function create(array $payload): array
    {
        return $this->request('post', '/projects', $payload);
    }

    /**
     * @throws ConnectionException
     */
    public function list(int $limit = 100, ?string $cursor = null): array
    {
        return $this->request('get', '/projects', array_filter([
            'limit' => $limit,
            'cursor' => $cursor,
        ]));
    }

    /**
     * @throws ConnectionException
     */
    public function update(string $projectId, array $payload): void
    {
        $this->request('put', "/projects/{$projectId}", $payload); // 204
    }

    /**
     * @throws ConnectionException
     */
    public function delete(string $projectId): void
    {
        $this->request('delete', "/projects/{$projectId}"); // 204
    }

    /**
     * @throws ConnectionException
     */
    public function addUsers(string $projectId, array $relations): void
    {
        $this->request('post', "/projects/{$projectId}/users", ['relations' => $relations]);
    }

    /**
     * @throws ConnectionException
     */
    public function changeUserRole(string $projectId, string $userId, string $role): void
    {
        $this->request('patch', "/projects/{$projectId}/users/{$userId}", ['role' => $role]);
    }

    /**
     * @throws ConnectionException
     */
    public function removeUser(string $projectId, string $userId): void
    {
        $this->request('delete', "/projects/{$projectId}/users/{$userId}");
    }
}
