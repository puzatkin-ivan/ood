<?php

namespace Condiment;

use Beverage\BeverageInterface;

class Cinnamon extends CondimentDecorator
{
    public function __construct(BeverageInterface $beverage)
    {
        parent::__construct($beverage);
    }

    public function getCondimentDescription(): string
    {
        return 'Cinnamon';
    }

    public function getCondimentCost(): float
    {
        return 20;
    }
}