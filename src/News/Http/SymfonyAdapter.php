<?php

declare(strict_types=1);

namespace App\News\Http;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SymfonyAdapter implements HttpInterface
{
    private HttpClientInterface $httpClient;

    public string $baseUrl;
    public string $apiKey;

    public function __construct(HttpClientInterface $httpClient = null)
    {
        $this->httpClient = $httpClient ?: HttpClient::create();
    }

    public function get(string $url, array $params): array
    {
        $response = $this->httpClient->request('GET', $this->apiUrl($url), [
            'query' => $params,
            'headers' => [
                'Authorization' => $this->apiKey,
            ]
        ]);

        return $response->toArray();
    }

    private function apiUrl(string $url): string
    {
        return $this->baseUrl.'/v2/'.$url;
    }
}
