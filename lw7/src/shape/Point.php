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
        return $this->x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function __clone()
    {
        return new Point($this->x, $this->y);
    }
}