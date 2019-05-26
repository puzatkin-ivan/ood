<?php

namespace Shape;

use Style\OutlineStyleInterface;
use Style\StyleInterface;

class GroupShape implements GroupShapeInterface
{

    public function getShapesCount(): int
    {
        // TODO: Implement getShapesCount() method.
    }

    public function getShapeAtIndex(int $index): ShapeInterface
    {
        // TODO: Implement getShapeAtIndex() method.
    }

    public function insertShape(ShapeInterface $shape, ?int $position = null): void
    {
        // TODO: Implement insertShape() method.
    }

    public function removeShapeAtIndex(int $index): void
    {
        // TODO: Implement removeShapeAtIndex() method.
    }

    public function getFrame(): Frame
    {
        // TODO: Implement getFrame() method.
    }

    public function setFrame(Frame $frame): void
    {
        // TODO: Implement setFrame() method.
    }

    public function getOutlineStyle(): OutlineStyleInterface
    {
        // TODO: Implement getOutlineStyle() method.
    }

    public function getFillStyle(): StyleInterface
    {
        // TODO: Implement getFillStyle() method.
    }

    public function getGroup(): ?GroupShapeInterface
    {
        // TODO: Implement getGroup() method.
    }
}