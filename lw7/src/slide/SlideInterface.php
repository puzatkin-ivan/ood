<?php

namespace Slide;

use Canvas\DrawableInterface;
use Shape\ShapeInterface;

interface SlideInterface extends DrawableInterface
{
    public function getWidth(): float;
    public function getHeight(): float;

    public function addShape(ShapeInterface $shape): void;
}