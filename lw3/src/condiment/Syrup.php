<?php

namespace Condiment;

use Beverage\BeverageInterface;

class Syrup extends CondimentDecorator
{
    /** @var int */
    private $syrupType;

    public function __construct(BeverageInterface $beverage, int $syrupType)
    {
        parent::__construct($beverage);
        $this->syrupType = $syrupType;
    }

    public function getCondimentDescription(): string
    {
        return ($this->syrupType == SyrupType::Chocolate ? 'Chocolate' : 'Maple') . ' syrup';
    }

    public function getCondimentCost(): float
    {
        return 15;
    }
}