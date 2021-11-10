<?php

declare(strict_types=1);

namespace App\News;

use App\News\Http\HttpInterface;
use App\News\Http\SymfonyAdapter;
use App\News\Model\Article;

class NewsApi
{
    private HttpInterface $http;

    public function __construct(Config $config, HttpInterface $http = null)
    {
        $this->http = $http ?: new SymfonyAdapter();

        $this->http->apiKey = $config->apiKey;
        $this->http->baseUrl = $config->baseUrl;
    }

    public function topHeadlines(string $country): array
    {
        $response = $this->http->get('/top-headlines', [
            'country' => $country,
        ]);

        return $this->collection($response["articles"]);
    }

    protected function collection(array $collection): array
    {
        $articles = [];

        foreach ($collection as $article) {
            $articles[] = new Article($article);
        }

        return $articles;
    }
}
