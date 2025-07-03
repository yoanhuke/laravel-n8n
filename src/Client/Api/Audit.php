<?php

namespace KayedSpace\N8n\Client\Api;

use KayedSpace\N8n\Enums\RequestMethod;

class Audit extends AbstractApi
{
    public function generate(array $additionalOptions = []): array
    {
        return $this->request(RequestMethod::Post, '/audit', ['additionalOptions' => $additionalOptions]);
    }
}
