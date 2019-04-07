<?php

namespace ShapeDrawingLib;

use GraphicsLib\CanvasInterface;

class Rectangle implements CanvasDrawableInterface
{
    /** @var Point */
    private $leftTop;
    /** @var int */
    private $height;
    /** @var int */
    private $width;
    /** @var string */
    private $color;

    public function __construct(Point $leftTop, int $width, int $height, ?string $color = RGBAColor::BLACK)
    {
        $this->leftTop = $leftTop;
        $this->width = $width;
        $this->height = $height;
        $this->color = $color;
    }

    public function draw(CanvasInterface $canvas): void
    {
        $leftTopX = $this->leftTop->getX();
        $leftTopY = $this->leftTop->getY();
        $canvas->setColor($this->color);
        $canvas->moveTo($leftTopX, $leftTopY);

        $rightTopX = $this->leftTop->getX() + $this->width;
        $rightBottomY = $this->leftTop->getY() + $this->height;
        $canvas->lineTo($rightTopX, $leftTopY);
        $canvas->lineTo($rightTopX, $rightBottomY);
        $canvas->lineTo($leftTopX, $rightBottomY);
        $canvas->lineTo($leftTopX, $leftTopY);
    }
}