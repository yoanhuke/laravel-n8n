<?php

declare(strict_types=1);

use KayedSpace\N8n\Facades\N8nClient;
use Illuminate\Support\Facades\Http;

it('sends request to fetch workflows list', function () {
    Http::fake([
        '/workflows' => Http::response([
            'data' => [
                'createdAt' => '2025-07-01T16:12:48.144Z',
                'updatedAt' => '2025-07-01T16:12:48.144Z',
                'id' => 'TusgiOHSbAp50dQm',
                'name' => 'workflow Example',
                'active' => false,
                'isArchived' => false,
            ],
        ])
    ]);

    $workflowsList = N8nClient::workflows()->list();

    expect($workflowsList)->toHaveKey('data');
    expect($workflowsList)->toMatchArray(['data' => [
        'createdAt' => '2025-07-01T16:12:48.144Z',
        'updatedAt' => '2025-07-01T16:12:48.144Z',
        'id' => 'TusgiOHSbAp50dQm',
        'name' => 'workflow Example',
        'active' => false,
        'isArchived' => false,
    ]]);
});
