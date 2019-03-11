<?php

namespace shape;

use canvas\CanvasInterface;

abstract class Shape
{
    /** @var string */
    private $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    abstract public function draw(CanvasInterface $canvas): void;
}