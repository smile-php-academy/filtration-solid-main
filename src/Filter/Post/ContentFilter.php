<?php

declare(strict_types=1);

namespace App\Filter\Post;

use Doctrine\ORM\QueryBuilder;

class ContentFilter implements PostFilterInterface
{
    public function filter(QueryBuilder $queryBuilder, $value)
    {
        $queryBuilder
            ->andWhere('p.content like :content')
            ->setParameter('content', '%' . $value . '%');
    }

    public static function alias(): string
    {
        return 'content';
    }
}
