<?php

namespace canvas;

use shape\Point;

interface CanvasInterface
{
    public function setColor(string $color): void;
    public function drawLine(Point $from, Point $to): void;
    public function drawEllipse(float $left, float $top, float $width, float $height): void;
}