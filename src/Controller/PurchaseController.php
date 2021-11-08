<?php

declare(strict_types=1);

namespace App\Controller;

use App\Payment\PaymentManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PurchaseController
{
    private PaymentManager $paymentManager;

    public function __construct(PaymentManager $paymentManager)
    {
        $this->paymentManager = $paymentManager;
    }

    /**
     * @Route("/payment/purchase", methods={"POST"}, name="app_purchase")
     */
    public function __invoke(Request $request): Response
    {
        $gateway = $this->paymentManager->create(
            $request->request->get('gateway')
        );

        return new Response($gateway->purchase(5));
    }
}
