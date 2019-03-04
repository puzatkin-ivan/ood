<?php

namespace Beverage;

class SmallMilkshake extends Milkshake
{
    public function __construct()
    {
        parent::__construct('Small Milkshake');
    }

    public function getCost(): float
    {
        return 50;
    }
}