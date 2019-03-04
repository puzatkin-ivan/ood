<?php

namespace Beverage;

class LargeMilkshake extends Milkshake
{
    public function __construct()
    {
        parent::__construct('Large Milkshake');
    }

    public function getCost(): float
    {
        return 80;
    }
}