<?php

namespace Beverage;

class Latte extends Coffee
{
    public function __construct()
    {
        parent::__construct('Latte');
    }

    public function getCost(): float
    {
        return 90;
    }
}