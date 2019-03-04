<?php

namespace Condiment;


use Beverage\BeverageInterface;

class Cream extends CondimentDecorator
{
    public function __construct(BeverageInterface $beverage)
    {
        parent::__construct($beverage);
    }

    public function getCondimentDescription(): string
    {
        return 'Cream';
    }

    public function getCondimentCost(): float
    {
        return 25;
    }
}