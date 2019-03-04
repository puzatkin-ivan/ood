<?php

namespace Beverage;


class DoubleCappuccino extends Coffee
{
    public function __construct()
    {
        parent::__construct('Double Cappuccino');
    }

    public function getCost(): float
    {
        return 120;
    }
}