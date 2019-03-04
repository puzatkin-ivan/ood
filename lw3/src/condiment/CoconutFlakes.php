<?php

namespace Condiment;

use Beverage\BeverageInterface;

class CoconutFlakes extends CondimentDecorator
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
        return 'Coconut flakes ' . $this->mass . 'g';
    }

    public function getCondimentCost(): float
    {
        return $this->mass;
    }
}