<?php

declare(strict_types=1);

namespace App\Filter\Post;

use Doctrine\ORM\QueryBuilder;

class TitleFilter implements PostFilterInterface
{
    public function filter(QueryBuilder $queryBuilder, $value)
    {
        $queryBuilder
            ->andWhere('p.title like :title')
            ->setParameter('title', '%' . $value . '%');
    }

    public static function alias(): string
    {
        return 'title';
    }
}
