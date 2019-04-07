<?php

namespace App;

use GraphicsLib\CanvasInterface;
use ModernGraphicsLib\ModernGraphicsRenderer;
use ModernGraphicsLib\Point;
use ModernGraphicsLib\RGBAColor;

class ModernGraphicsRendererAdapter extends ModernGraphicsRenderer implements CanvasInterface
{
    /** @var ModernGraphicsRenderer */
    private $renderer;
    /** @var Point */
    private $currentPoint;
    /** @var RGBAColor */
    private $color;

    public function __construct(ModernGraphicsRenderer $renderer)
    {
        $this->renderer = $renderer;
        $this->currentPoint = new  Point(0, 0);
    }

    public function setColor(string $color): void
    {
        $r = 0;
        $g = 0;
        $b = 0;
        $a = 1.0;
        $this->color = new RGBAColor($r, $g, $b, $a);
    }

    public function beginDraw(): void
    {
        $this->renderer->beginDraw();
    }

    public function drawLine(Point $start, Point $end, RGBAColor $color): void
    {
        $this->renderer->drawLine($start, $end, $color);
    }

    public function endDraw(): void
    {
        $this->renderer->endDraw();
    }

    public function moveTo(int $x, int $y): void
    {
        $this->currentPoint->setX($x);
        $this->currentPoint->setY($y);
    }

    public function lineTo(int $x, int $y): void
    {
        $this->renderer->drawLine($this->currentPoint, new Point($x, $y), $this->color);
        $this->moveTo($x, $y);
    }
}