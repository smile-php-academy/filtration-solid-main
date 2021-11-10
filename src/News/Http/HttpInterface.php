<?php

declare(strict_types=1);

namespace App\News\Http;

interface HttpInterface
{
    public function get(string $url, array $params): array;
}
