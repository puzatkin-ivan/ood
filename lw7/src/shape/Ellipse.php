<?php

namespace Shape;

use Canvas\CanvasInterface;
use Color\RGBColor;
use Style\FillStyle;
use Style\OutlineStyle;

class Ellipse extends Shape
{
    /** @var Point */
    private $center;
    /** @var float */
    private $horizontalRadius;
    /** @var float */
    private $verticalRadius;

    public function __construct(Point $center, float $horizontalRadius, float $verticalRadius)
    {
        $this->center = clone $center;
        $this->horizontalRadius = $horizontalRadius;
        $this->verticalRadius = $verticalRadius;

        $defaultColor = new RGBColor(0, 0, 0);
        $defaultThickness = 2;
        $defaultOutlineStyle = new OutlineStyle($defaultColor, $defaultThickness);
        $defaultFillStyle = new FillStyle($defaultColor);
        parent::__construct($defaultOutlineStyle, $defaultFillStyle, null);
    }

    public function getFrame(): Frame
    {
        $leftTopX = $this->center->getX() - $this->horizontalRadius;
        $leftTopY = $this->center->getX() - $this->verticalRadius;
        $width = $this->horizontalRadius * 2;
        $height = $this->verticalRadius * 2;
        $leftTop = new Point($leftTopX, $leftTopY);
        return new Frame($leftTop, $width, $height);
    }

    public function setFrame(Frame $frame): void
    {
        $this->horizontalRadius = $frame->getWidth() / 2;
        $this->verticalRadius = $frame->getHeight() / 2;

        $point = $frame->getLeftTopPoint();
        $x = $point->getX() + $this->horizontalRadius;
        $y = $point->getY() + $this->verticalRadius;
        $this->center = new Point($x, $y);
    }

    protected function doDraw(CanvasInterface $canvas): void
    {
        $canvas->setOutlineThickness($this->getOutlineStyle()->getOutlineThickness());
        $canvas->setOutlineColor($this->getOutlineStyle()->getColor());
        $canvas->setFillColor($this->getFillStyle()->getColor());
        $canvas->drawEllipse($this->center, $this->horizontalRadius, $this->verticalRadius);
    }
}