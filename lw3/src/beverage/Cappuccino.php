<?php

namespace Beverage;

class Cappuccino extends Coffee
{
    public function __construct()
    {
        parent::__construct('Cappuccino');
    }

    public function getCost(): float
    {
        return 80;
    }
}