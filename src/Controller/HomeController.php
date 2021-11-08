<?php

declare(strict_types=1);

namespace App\Controller;

use App\Payment\PaymentManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController
{
    private Environment $twig;
    private PaymentManager $paymentManager;

    public function __construct(Environment $twig, PaymentManager $paymentManager)
    {
        $this->twig = $twig;
        $this->paymentManager = $paymentManager;
    }

    /**
     * @Route("/")
     */
    public function __invoke(): Response
    {
        $response = $this->twig->render('home/index.html.twig', [
            'gateways' => $this->paymentManager->gatewaysNames(),
        ]);

        return new Response($response);
    }
}
