<?php

namespace Slide;

use Canvas\CanvasInterface;
use Shape\ShapeInterface;

class Slide implements SlideInterface
{
    /** @var float */
    private $width;
    /** @var float */
    private $height;
    /** @var ShapeInterface[] */
    private $shapes;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
        $this->shapes = [];
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function addShape(ShapeInterface $shape): void
    {
        array_push($this->shapes, $shape);
    }

    public function draw(CanvasInterface $canvas): void
    {
        $canvas->setSize($this->width, $this->height);

        foreach ($this->shapes as $shape)
        {
            $shape->draw($canvas);
        }
    }
}