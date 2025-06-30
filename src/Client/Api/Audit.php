<?php
namespace KayedSpace\N8n\Client\Api;


class Audit extends AbstractApi
{
    public function generate(array $additionalOptions = []): array
    {
        return $this->request('post', '/audit', ['additionalOptions' => $additionalOptions]);
    }
}

