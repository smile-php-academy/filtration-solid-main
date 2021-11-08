<?php

declare(strict_types=1);

namespace App\Payment\Gateway;

class CmiFactory implements GatewayInterface
{
    public function purchase(int $amount): string
    {
        return 'the payment has been made successfully with Cmi';
    }

    public static function alias(): string
    {
        return 'cmi';
    }
}
