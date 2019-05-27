<?php

namespace Shape;

class Point
{
    /** @var float */
    private $x;
    /** @var float */
    private $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): float
    {
        return round($this->x, 2);
    }

    public function getY(): float
    {
        return round($this->y, 2);
    }

    public function __clone()
    {
        return new Point($this->x, $this->y);
    }
}