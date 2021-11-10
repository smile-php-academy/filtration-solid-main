<?php

declare(strict_types=1);

namespace App\News;

class Config
{
    public string $baseUrl;
    public string $apiKey;

    public function __construct(string $apiKey, string $baseUrl = null)
    {
        $this->apiKey = $apiKey;
        $this->baseUrl = $baseUrl ?: "https://newsapi.org";
    }
}
