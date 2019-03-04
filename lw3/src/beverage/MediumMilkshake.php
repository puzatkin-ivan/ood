<?php

namespace Beverage;

class MediumMilkshake extends Milkshake
{
    public function __construct()
    {
        parent::__construct('Medium Milkshake');
    }

    public function getCost(): float
    {
        return 60;
    }
}