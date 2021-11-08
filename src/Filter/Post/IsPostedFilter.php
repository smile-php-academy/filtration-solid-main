<?php

declare(strict_types=1);

namespace App\Filter\Post;

use Doctrine\ORM\QueryBuilder;

class IsPostedFilter implements PostFilterInterface
{
    public function filter(QueryBuilder $queryBuilder, $value)
    {
        $queryBuilder
            ->andWhere('p.isPosted = :isPosted')
            ->setParameter('isPosted', $this->parseValue($value));
    }

    public static function alias(): string
    {
        return 'is_posted';
    }

    private function parseValue($value): bool
    {
        if ('true' === $value) {
            return true;
        }

        if ('false' === $value) {
            return false;
        }

        return (bool) $value;
    }
}
