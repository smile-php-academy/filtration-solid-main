<?php

declare(strict_types=1);

namespace HipoLabs\Api;

use HipoLabs\HipoLabs;

/**
 * @mixin HipoLabs
 */
abstract class Api
{
    protected HipoLabs $hipoLabs;

    public function __construct(HipoLabs $hipoLabs)
    {
        $this->hipoLabs = $hipoLabs;
    }

    abstract protected function resource(): string;

    protected function transformCollection(array $collection, string $class): array
    {
        return array_map(function ($data) use ($class) {
            return new $class($data);
        }, $collection);
    }

    public function __get($name)
    {
        return $this->hipoLabs->{$name};
    }

    public function __call($name, $arguments)
    {
        return $this->hipoLabs->{$name}(...$arguments);
    }
}
