<?php

namespace App\Filter\Post;

use Doctrine\ORM\QueryBuilder;

interface PostFilterInterface
{
    public function filter(QueryBuilder $queryBuilder, $value);

    public static function alias(): string;
}
