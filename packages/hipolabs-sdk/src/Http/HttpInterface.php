<?php

namespace HipoLabs\Http;

interface HttpInterface
{
    public function get(string $resource, string $url, array $query): array;
}
