<?php

namespace Canvas;

use Color\RGBColor;
use Shape\Point;

interface CanvasInterface
{
    public function setFillColor(RGBColor $color): void;
    public function setOutlineColor(RGBColor $color): void;
    public function setSize(float $width, float $height): void;
    public function setOutlineThickness(float $thickness): void;

    public function drawEllipse(Point $center, float $horizontalRadius, float $verticalRadius): void;
    public function drawLine(Point $from, Point $to): void;
    public function drawPolygon(array $points): void;
}