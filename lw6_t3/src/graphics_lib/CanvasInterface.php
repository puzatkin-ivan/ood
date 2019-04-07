<?php

namespace GraphicsLib;

interface CanvasInterface
{
    public function setColor(string $color): void;
    public function moveTo(int $x, int $y): void;
    public function lineTo(int $x, int $y): void;
}
