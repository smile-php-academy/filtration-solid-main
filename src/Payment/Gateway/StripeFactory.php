<?php

declare(strict_types=1);

namespace App\Payment\Gateway;

class StripeFactory implements GatewayInterface
{
    public function purchase(int $amount): string
    {
        return 'Your payment has been validated with a Stripe';
    }

    public static function alias(): string
    {
        return 'stripe';
    }
}
