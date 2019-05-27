<?php

namespace Shape;

class Frame
{
    /** @var Point */
    private $leftTop;
    /** @var float */
    public $width;
    /** @var float */
    public $height;

    public function __construct(Point $leftTop, float $width, float $height)
    {
        $this->leftTop = clone $leftTop;
        $this->width = $width;
        $this->height = $height;
    }

    public function getLeftTopPoint(): Point
    {
        return clone $this->leftTop;
    }

    public function getWidth(): float
    {
        return round($this->width, 2);
    }

    public function getHeight(): float
    {
        return round($this->height, 2);
    }

    public function __clone()
    {
        return new Frame($this->leftTop, $this->width, $this->height);
    }
}