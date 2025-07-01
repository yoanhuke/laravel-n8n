<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;

class Users extends AbstractApi
{
    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function list(array $filters = []): array
    {
        // filters: limit, cursor, includeRole, projectId
        return $this->request('get', '/users', $filters);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function create(array $userPayloads): array
    {
        // expects array of user objects
        return $this->request('post', '/users', $userPayloads);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function get(string $idOrEmail, bool $includeRole = false): array
    {
        return $this->request('get', "/users/{$idOrEmail}", ['includeRole' => $includeRole]);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function delete(string $idOrEmail)
    {
        return $this->request('delete', "/users/{$idOrEmail}");
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function changeRole(string $idOrEmail, string $newRoleName): array
    {
        return $this->request('patch', "/users/{$idOrEmail}/role", ['newRoleName' => $newRoleName]);
    }
}
