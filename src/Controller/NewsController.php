<?php

declare(strict_types=1);

namespace App\Controller;

use App\News\NewsApi;
use Symfony\Component\Routing\Annotation\Route;

class NewsController
{
    /**
     * @Route("/news")
     */
    public function __invoke(NewsApi $articleApi)
    {

        dd($articleApi->topHeadlines('ma'));
    }
}
