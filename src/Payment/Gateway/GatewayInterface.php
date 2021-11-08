<?php

declare(strict_types=1);

namespace App\Payment\Gateway;

interface GatewayInterface
{
    public function purchase(int $amount): string;

    public static function alias(): string;
}
