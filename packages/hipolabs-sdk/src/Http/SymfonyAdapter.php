<?php

declare(strict_types=1);

namespace HipoLabs\Http;

use Symfony\Contracts\HttpClient\HttpClientInterface as SymfonyHttpClient;

final class SymfonyAdapter extends BaseAdapter
{
    private SymfonyHttpClient $http;

    public function __construct(SymfonyHttpClient $http)
    {
        $this->http = $http;
    }

    public function get(string $resource, string $url, array $query): array
    {
        $response = $this->http->request('GET', $this->apiUrl($resource, $url), [
            'query' => $query,
        ]);

        return $response->toArray();
    }
}
