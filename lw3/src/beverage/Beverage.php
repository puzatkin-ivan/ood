<?php

namespace Beverage;

abstract class Beverage implements BeverageInterface
{
    /** @var string */
    private $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    abstract public function getCost(): float;
}