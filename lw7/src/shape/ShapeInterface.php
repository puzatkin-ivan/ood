<?php

namespace Shape;

use Canvas\DrawableInterface;
use Style\OutlineStyleInterface;
use Style\StyleInterface;

interface ShapeInterface extends DrawableInterface
{
    public function getFrame(): Frame;
    public function setFrame(Frame $frame): void;

    public function getOutlineStyle(): OutlineStyleInterface;

    public function getFillStyle(): StyleInterface;

    public function getGroup(): ?GroupShapeInterface;
}