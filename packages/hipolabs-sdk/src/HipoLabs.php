<?php

declare(strict_types=1);

namespace HipoLabs;

use HipoLabs\Api\UniversityApi;
use HipoLabs\Http\HttpInterface;

final class HipoLabs
{
    public HttpInterface $http;
    public UniversityApi $university;

    public function __construct(HttpInterface $http)
    {
        $this->http = $http;
        $this->university = new UniversityApi($this);
    }
}
