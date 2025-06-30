<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;

class Executions extends AbstractApi
{
    /**
     * @throws ConnectionException
     */
    public function list(array $filters = []): array
    {
        // filters: includeData, status, workflowId, projectId, limit, cursor

        return $this->request('get', '/executions', $filters);
    }

    /**
     * @throws ConnectionException
     */
    public function get(int $id, bool $includeData = false): array
    {
        return $this->request('get', "/executions/{$id}", ['includeData' => $includeData]);
    }

    /**
     * @throws ConnectionException
     */
    public function delete(int $id): array
    {
        return $this->request('delete', "/executions/{$id}");
    }
}
