<?php

namespace shape;

use canvas\CanvasInterface;

class Rectangle extends Shape
{
    /** @var Point */
    private $leftTop;
    /** @var Point */
    private $rightBottom;

    public function __construct(Point $leftTop, Point $rightBottom, string $color)
    {
        parent::__construct($color);
        $this->leftTop = $leftTop;
        $this->rightBottom = $rightBottom;
    }

    public function draw(CanvasInterface $canvas): void
    {
        $canvas->setColor($this->getColor());
        $rightTop = new Point($this->rightBottom->getX(), $this->leftTop->getY());
        $leftBottom = new Point($this->leftTop->getX(), $this->rightBottom->getY());

        $canvas->drawLine($this->leftTop, $rightTop);
        $canvas->drawLine($rightTop, $this->rightBottom);
        $canvas->drawLine($this->rightBottom, $leftBottom);
        $canvas->drawLine($leftBottom, $this->leftTop);
    }

    public function getLeftTop(): Point
    {
        return $this->leftTop;
    }

    public function getRightBottom(): Point
    {
        return $this->rightBottom;
    }
}