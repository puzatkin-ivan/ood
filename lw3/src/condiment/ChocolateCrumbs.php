<?php

namespace Condiment;

use Beverage\BeverageInterface;

class ChocolateCrumbs extends CondimentDecorator
{
    /** @var int */
    private $mass;

    public function __construct(BeverageInterface $beverage, int $mass)
    {
        parent::__construct($beverage);
        $this->mass = $mass;
    }

    public function getCondimentDescription(): string
    {
        return 'Chocolate crimbs ' . $this->mass . 'g';
    }

    public function getCondimentCost(): float
    {
        return 2 * $this->mass;
    }
}