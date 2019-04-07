<?php

namespace ModernGraphicsLib;

class RGBAColor
{
    /** @var float */
    private $r;
    /** @var float */
    private $g;
    /** @var float */
    private $b;
    /** @var float */
    private $a;

    public function __construct(float $r, float $g, float $b, float $a)
    {
        $this->r = $r;
        $this->g = $g;
        $this->b = $b;
        $this->a = $a;
    }

    public function getRed(): float
    {
        return $this->r;
    }

    public function getGreen(): float
    {
        return $this->g;
    }

    public function getBlue(): float
    {
        return $this->b;
    }

    public function getAlpha(): float
    {
        return $this->a;
    }
}