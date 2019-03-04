<?php

namespace Beverage;


class DoubleLatte extends Coffee
{
    public function __construct()
    {
        parent::__construct('Double coffee');
    }

    public function getCost(): float
    {
        return 130;
    }
}