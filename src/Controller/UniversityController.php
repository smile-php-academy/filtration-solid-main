<?php

declare(strict_types=1);

namespace App\Controller;

use HipoLabs\HipoLabs;
use Symfony\Component\Routing\Annotation\Route;

class UniversityController
{
    /**
     * @Route("/university")
     */
    public function __invoke(HipoLabs $hipoLabs)
    {
        $universities = $hipoLabs->university->fromMorocco();

        dd($universities);
    }
}
