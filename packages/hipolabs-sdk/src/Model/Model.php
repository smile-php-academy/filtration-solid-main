<?php

declare(strict_types=1);

namespace HipoLabs\Model;

use function Symfony\Component\String\u;

abstract class Model
{
    public function __construct(array $attributes)
    {
        $this->fill($attributes);
    }

    protected function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $key = (string) u($key)->camel();

            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}
