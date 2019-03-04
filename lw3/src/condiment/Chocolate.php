<?php

namespace Condiment;

use Beverage\BeverageInterface;

class Chocolate extends CondimentDecorator
{
    private $count;

    public function __construct(BeverageInterface $beverage, int $count)
    {
        parent::__construct($beverage);
        if ($count > 5)
        {
            throw new \OutOfRangeException('No more than 5 chocolate items');
        }
        $this->count = $count;
    }

    public function getCondimentDescription(): string
    {
        return 'Chocolate ' . $this->count . ' items';
    }

    public function getCondimentCost(): float
    {
        return 10 * $this->count;
    }
}