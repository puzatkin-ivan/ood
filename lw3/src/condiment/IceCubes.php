<?php

namespace Condiment;

use Beverage\BeverageInterface;

class IceCubes extends CondimentDecorator
{
    /** @var int */
    private $quantity;
    /** @var int */
    private $type;

    public function __construct(BeverageInterface $beverage, int $quantity, ?int $type = IceCubeType::WATER)
    {
        parent::__construct($beverage);
        $this->quantity = $quantity;
        $this->type = $type;
    }

    public function getCondimentCost(): float
    {
        return ($this->type == IceCubeType::DRY ? 10 : 5) * $this->quantity;
    }

    public function getCondimentDescription(): string
    {
        return
            ($this->type == IceCubeType::DRY ? 'Dry' : 'Water')
            . ' ice cube x '
            . $this->quantity;
    }
}