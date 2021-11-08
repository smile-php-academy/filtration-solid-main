<?php

declare(strict_types=1);

namespace App\Payment;

use App\Payment\Gateway\GatewayInterface;

class PaymentManager
{
    /** @var array<string, GatewayInterface> */
    private array $gateways;

    public function __construct(iterable $gateways)
    {
        $this->gateways = $gateways instanceof \Traversable ? iterator_to_array($gateways) : $gateways;
    }

    public function create(string $alias): GatewayInterface
    {
        if (!isset($this->gateways[$alias])) {
            throw new \InvalidArgumentException(sprintf('Gateway "%s" is not registered', $alias));
        }

        return $this->gateways[$alias];
    }

    /**
     * @return string[]
     */
    public function gatewaysNames(): array
    {
        return array_keys($this->gateways);
    }
}
