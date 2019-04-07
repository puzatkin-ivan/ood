<?php

namespace ModernGraphicsLib;

class Point
{
    private $x;
    private $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function setX(float $x): float
    {
        $this->x = $x;
    }

    public function setY(float $y): float
    {
        $this->y = $y;
    }
}