<?php

namespace Shape;

use Canvas\CanvasInterface;
use Color\RGBColor;
use phpDocumentor\Reflection\FqsenResolver;
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
        $this->vertexA = $this->updateVertex($this->vertexA, $oldFrame, $frame);
        $this->vertexB = $this->updateVertex($this->vertexB, $oldFrame, $frame);
        $this->vertexC = $this->updateVertex($this->vertexC, $oldFrame, $frame);
    }

    protected function doDraw(CanvasInterface $canvas): void
    {
        $canvas->setOutlineThickness($this->getOutlineStyle()->getOutlineThickness());
        $canvas->setOutlineColor($this->getOutlineStyle()->getColor());
        $canvas->setFillColor($this->getFillStyle()->getColor());

        $canvas->drawPolygon([$this->vertexA, $this->vertexB, $this->vertexC]);
    }

    private function updateVertex(Point $point, Frame $oldFrame, Frame $frame): Point
    {
        $oldLeftTop = $oldFrame->getLeftTopPoint();
        $scaleX = ($point->getX() - $oldLeftTop->getX()) / $oldFrame->getWidth();
        $scaleY = ($point->getY() - $oldLeftTop->getY()) / $oldFrame->getHeight();

        $leftTop = $frame->getLeftTopPoint();
        $x = $leftTop->getX() + $frame->getWidth() * $scaleX;
        $y = $leftTop->getY() + $frame->getHeight() * $scaleY;
        return new Point($x, $y);
    }
}