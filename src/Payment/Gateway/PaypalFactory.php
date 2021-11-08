<?php

declare(strict_types=1);

namespace App\Payment\Gateway;

class PaypalFactory implements GatewayInterface
{
    public function purchase(int $amount): string
    {
        return 'the payment has been made successfully with Paypal';
    }

    public static function alias(): string
    {
        return 'paypal';
    }
}
