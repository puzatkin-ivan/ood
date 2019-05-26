<?php

namespace Shape;

use Canvas\CanvasInterface;
use Color\RGBColor;
use Style\FillStyle;
use Style\OutlineStyle;

class Triangle extends Shape
{
    /** @var Point */
    private $vertexA;
    /** @var Point */
    private $vertexB;
    /** @var Point */
    private $vertexC;

    public function __construct(Point $vertexA, Point $vertexB, Point $vertexC)
    {
        $this->vertexA = $vertexA;
        $this->vertexB = $vertexB;
        $this->vertexC = $vertexC;

        $defaultColor = new RGBColor(0, 0, 0);
        $defaultThickness = 2;
        $defaultOutlineStyle = new OutlineStyle($defaultColor, $defaultThickness);
        $defaultFillStyle = new FillStyle($defaultColor);
        parent::__construct($defaultOutlineStyle, $defaultFillStyle, null);
    }

    public function getFrame(): Frame
    {
        $minX = min($this->vertexA->getX(), $this->vertexB->getX(), $this->vertexC->getX());
        $maxX = max($this->vertexA->getX(), $this->vertexB->getX(), $this->vertexC->getX());

        $minY = min($this->vertexA->getY(), $this->vertexB->getY(), $this->vertexC->getY());
        $maxY = max($this->vertexA->getY(), $this->vertexB->getY(), $this->vertexC->getY());

        $width = $maxX - $minX;
        $height = $maxY - $minY;
        $point = new Point($maxX, $minY);
        return new Frame($point, $width, $height);
    }

    public function setFrame(Frame $frame): void
    {
        $oldFrame = $this->getFrame();
        $this->vertexA = $this->updateVertex($this->vertexA, $oldFrame);
        $this->vertexB = $this->updateVertex($this->vertexB, $oldFrame);
        $this->vertexC = $this->updateVertex($this->vertexC, $oldFrame);
    }

    protected function doDraw(CanvasInterface $canvas): void
    {
        $canvas->drawLine($this->vertexA, $this->vertexB);
        $canvas->drawLine($this->vertexB, $this->vertexC);
        $canvas->drawLine($this->vertexC, $this->vertexA);
    }

    private function updateVertex(Point $point, Frame $frame): Point
    {
        $leftTop = $frame->getLeftTopPoint();
        $scaleX = ($point->getX() - $leftTop->getX()) / $frame->getWidth();
        $scaleY = ($point->getY() - $leftTop->getY()) / $frame->getHeight();

        $x = $leftTop->getX() + $frame->getWidth() * $scaleX;
        $y = $leftTop->getY() + $frame->getHeight() * $scaleY;
        return new Point($x, $y);
    }
}