<?php

namespace Condiment;

use Beverage\BeverageInterface;

class Liquor extends CondimentDecorator
{
    /** @var int */
    private $type;

    public function __construct(BeverageInterface $beverage, int $type = LiquorType::CHOCOLATE)
    {
        parent::__construct($beverage);
        $this->type = $type;
    }

    public function getCondimentDescription(): string
    {
        return
            ($this->type == LiquorType::CHOCOLATE ? 'Chocolate' : 'Nut')
            . 'liquor';
    }

    public function getCondimentCost(): float
    {
        return 50;
    }
}