<?php

namespace App;

use GraphicsLib\CanvasInterface;
use ModernGraphicsLib\ModernGraphicsRenderer;
use ModernGraphicsLib\Point;

class ModernGraphicsRendererClassAdapter extends ModernGraphicsRenderer implements CanvasInterface
{
    /** @var string */
    private $color;
    /** @var Point */
    private $currentPoint;

    public function setColor(string $color): void
    {
        $colors = str_split(substr($color, 1), 2);
        $r = hexdec($colors[0] ?? '');
        $g = hexdec($colors[1] ?? '');
        $b = hexdec($colors[2] ?? '');
        $a = 1.0;
        $this->color = new RGBAColor($r, $g, $b, $a);
    }

    public function moveTo(int $x, int $y): void
    {
        $this->currentPoint->setX($x);
        $this->currentPoint->setY($y);
    }

    public function lineTo(int $x, int $y): void
    {
        $this->drawLine($this->currentPoint, new Point($x, $y), $this->color);
        $this->moveTo($x, $y);
    }
}