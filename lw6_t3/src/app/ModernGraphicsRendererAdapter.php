<?php

namespace App;

use GraphicsLib\CanvasInterface;
use ModernGraphicsLib\ModernGraphicsRenderer;
use ModernGraphicsLib\Point;
use ModernGraphicsLib\RGBAColor;
use PHPUnit\Runner\Exception;

class ModernGraphicsRendererAdapter implements CanvasInterface
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
        $colors = str_split(substr($color, 1), 2);
        $r = hexdec($colors[0] ?? '');
        $g = hexdec($colors[1] ?? '');
        $b = hexdec($colors[2] ?? '');
        $a = 1.0;
        $this->color = new RGBAColor($r, $g, $b, $a);
    }

    public function beginDraw(): void
    {
        try
        {
            $this->renderer->beginDraw();
        }
        catch (\LogicException $exception)
        {
            echo $exception->getMessage();
        }
    }

    public function endDraw(): void
    {
        try
        {
            $this->renderer->endDraw();
        }
        catch (\LogicException $exception)
        {
            echo $exception->getMessage();
        }
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