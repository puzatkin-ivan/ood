<?php

namespace Condiment;

use Beverage\BeverageInterface;

abstract class CondimentDecorator implements BeverageInterface
{
    /** @var BeverageInterface */
    private $beverage;

    public function getDescription(): string
    {
        return implode(', ', [$this->beverage->getDescription(), $this->getCondimentDescription()]);
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + $this->getCondimentCost();
    }

    abstract public function getCondimentDescription(): string;
    abstract public function getCondimentCost(): float;

    protected function __construct(BeverageInterface $beverage)
    {
        $this->beverage = $beverage;
    }
}