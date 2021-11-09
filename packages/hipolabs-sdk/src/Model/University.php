<?php

declare(strict_types=1);

namespace HipoLabs\Model;

final class University extends Model
{
    public string $name;
    public string $alphaTwoCode;
    public string $country;
    public array $webPages;
    public array $domains;
    public ?string $stateProvince = null;
}
