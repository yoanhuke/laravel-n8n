<?php

declare(strict_types=1);

namespace KayedSpace\N8n\Enums;

enum RequestMethod: string
{
    case Get = 'GET';
    case Post = 'POST';
    case Put = 'PUT';
    case Delete = 'DELETE';
    case Patch = 'PATCH';
    case Head = 'HEAD';
    case Options = 'OPTIONS';
}
