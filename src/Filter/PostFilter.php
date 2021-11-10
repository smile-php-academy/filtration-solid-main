<?php

declare(strict_types=1);

namespace App\Filter;

use App\Filter\Post\PostFilterInterface;
use App\Repository\PostRepository;

class PostFilter
{

    /** @var array<string, PostFilterInterface> */
    private array $filters = [];
    private PostRepository $postRepository;

    public function __construct(iterable $filters, PostRepository $postRepository)
    {
        $this->filters = $filters instanceof \Traversable ? iterator_to_array($filters) : (array) $filters;
        $this->postRepository = $postRepository;
    }

    public function filter(array $params = [])
    {
        $queryBuilder = $this->postRepository->createQueryBuilder('p');

        $params['is_posted'] = true;

        foreach ($this->filters as $alias => $filter) {
            if (!isset($params[$alias])) {
                continue;
            }

            $filter->filter($queryBuilder, $params[$alias]);
        }

        return $queryBuilder->getQuery()->getResult();
    }
}
