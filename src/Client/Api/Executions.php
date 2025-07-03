<?php

namespace KayedSpace\N8n\Client\Api;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use KayedSpace\N8n\Enums\RequestMethod;

class Executions extends AbstractApi
{
    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function list(array $filters = []): array
    {
        // filters: includeData, status, workflowId, projectId, limit, cursor

        return $this->request(RequestMethod::Get, '/executions', $filters);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function get(int $id, bool $includeData = false): array
    {
        return $this->request(RequestMethod::Get, "/executions/{$id}", ['includeData' => $includeData]);
    }

    /**
     * @throws ConnectionException
     * @throws RequestException
     */
    public function delete(int $id): array
    {
        return $this->request(RequestMethod::Delete, "/executions/{$id}");
    }
}
