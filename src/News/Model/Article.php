<?php

declare(strict_types=1);

namespace App\News\Model;

class Article
{
    public ?string $author = null;
    public ?string $title = null;
    public ?string $description = null;
    public ?string $url = null;
    public ?string $urlToImage = null;
    public ?string $publishedAt = null;
    public ?string $content = null;

    public function __construct(array $article)
    {
        foreach ($article as $key => $value) {
            if (!property_exists($this, $key)) {
                continue;
            }

            $this->{$key} = $value;
        }
    }
}
