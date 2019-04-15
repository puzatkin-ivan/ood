<?php

namespace GraphicsLib;

class Canvas implements CanvasInterface
{
    public function setColor(string $color): void
    {
        echo $color . PHP_EOL;
    }

    public function moveTo(float $x, float $y): void
    {
        echo 'Move To (' . $x . ', ' . $y . ')' . PHP_EOL;
    }

    public function lineTo(float $x, float $y): void
    {
        echo 'Line To (' . $x . ', ' . $y . ')' . PHP_EOL;
    }
}
