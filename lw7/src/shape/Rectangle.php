<?php

namespace Shape;

use Canvas\CanvasInterface;
use Color\RGBColor;
use Style\FillStyle;
use Style\OutlineStyle;

class Rectangle extends Shape
{
    /** @var Point */
    private $leftTop;
    /** @var float */
    private $width;
    /** @var float */
    private $height;

    public function __construct(Point $leftTop, float $width, float $height)
    {
        $this->leftTop = $leftTop;
        $this->width = $width;
        $this->height = $height;

        $defaultColor = new RGBColor(0, 0, 0);
        $defaultThickness = 2;
        $defaultOutlineStyle = new OutlineStyle($defaultColor, $defaultThickness);
        $defaultFillStyle = new FillStyle($defaultColor);
        parent::__construct($defaultOutlineStyle, $defaultFillStyle, null);
    }

    public function getFrame(): Frame
    {
        return new Frame($this->leftTop, $this->width, $this->height);
    }

    public function setFrame(Frame $frame): void
    {
        $this->leftTop = $frame->getLeftTopPoint();
        $this->width = $frame->getWidth();
        $this->height = $frame->getHeight();
    }

    protected function doDraw(CanvasInterface $canvas): void
    {
        $leftX = $this->leftTop->getX();
        $leftY = $this->leftTop->getY();
        $rightX = $this->leftTop->getX() + $this->width;
        $rightY = $this->leftTop->getY() + $this->height;
        $rightTop = new Point($rightX, $leftY);
        $rightBottom = new Point($rightX, $rightY);
        $leftBottom = new Point($leftX, $rightY);

        $canvas->drawLine($this->leftTop, $rightTop);
        $canvas->drawLine($rightTop, $rightBottom);
        $canvas->drawLine($rightBottom, $leftBottom);
        $canvas->drawLine($leftBottom, $this->leftTop);
    }
}