<?php

namespace Condiment;

use Beverage\BeverageInterface;

class Lemon extends CondimentDecorator
{
    /** @var int */
    private $quality;

    public function __construct(BeverageInterface $beverage, int $quality)
    {
        parent::__construct($beverage);
        $this->quality = $quality;
    }

    public function getCondimentDescription(): string
    {
        return 'Lemon x ' . $this->quality;
    }

    public function getCondimentCost(): float
    {
        return 10 * $this->quality;
    }
}