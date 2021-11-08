<?php

declare(strict_types=1);

namespace App\Payment\Gateway;

class CreditCardFactory // implements GatewayInterface
{
    public function purchase(int $amount): string
    {
        return 'the payment has been made successfully with CreditCard';
    }

    public static function alias(): string
    {
        return 'credit_card';
    }
}
