<?php

namespace Beverage;

interface BeverageInterface
{
    public function getDescription(): string;
    public function getCost(): float;
}