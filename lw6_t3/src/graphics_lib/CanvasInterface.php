<?php

namespace GraphicsLib;

interface CanvasInterface
{
    public function setColor(string $color): void;
    public function moveTo(float $x, float $y): void;
    public function lineTo(float $x, float $y): void;
}
