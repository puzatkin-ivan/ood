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
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function __clone()
    {
        return new Frame($this->leftTop, $this->width, $this->height);
    }
}