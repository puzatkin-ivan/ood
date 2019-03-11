<?php

namespace canvas;

use shape\Point;

class Canvas implements CanvasInterface
{
    /** @var string */
    private $color;

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function drawLine(Point $from, Point $to): void
    {
        echo 'Draw line:' . PHP_EOL;
        echo '- from( ' . $from->getX() . ', ' . $from->getY() . ' )' . PHP_EOL;
        echo '- to( ' . $to->getX() . ', ' . $to->getY() . ' )' . PHP_EOL;
        echo '- color( ' . $this->color . ' )' . PHP_EOL;
    }

    public function drawEllipse(float $left, float $top, float $width, float $height): void
    {
        echo 'Draw ellipse:' . PHP_EOL;
        echo '- left: ' . $left . PHP_EOL;
        echo '- top: ' . $top . PHP_EOL;
        echo '- width: ' . $width . PHP_EOL;
        echo '- height: ' . $height . PHP_EOL;
        echo '- color: ' . $this->color . PHP_EOL;
    }
}