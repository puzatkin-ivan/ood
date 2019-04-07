<?php

namespace App;

use GraphicsLib\CanvasInterface;
use ModernGraphicsLib\ModernGraphicsRenderer;
use ModernGraphicsLib\Point;

class ModernGraphicsRendererAdapter implements CanvasInterface
{
    /** @var ModernGraphicsRenderer */
    private $renderer;
    /** @var Point */
    private $currentPoint;

    public function __construct(ModernGraphicsRenderer $renderer)
    {
        $this->renderer = $renderer;
        $this->currentPoint = new Point(0, 0);
    }

    public function moveTo(int $x, int $y): void
    {
        $this->currentPoint->setX($x);
        $this->currentPoint->setY($y);
    }

    public function lineTo(int $x, int $y): void
    {
        $this->renderer->drawLine($this->currentPoint, new Point($x, $y));
        $this->moveTo($x, $y);
    }
}