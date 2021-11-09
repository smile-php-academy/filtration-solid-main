<?php

declare(strict_types=1);

namespace HipoLabs\Http;

abstract class BaseAdapter implements HttpInterface
{
    protected string $baseUrl = 'http://%s.hipolabs.com';

    protected function apiUrl(string $resource, string $url): string
    {
        return sprintf($this->baseUrl, $resource).$url;
    }
}
