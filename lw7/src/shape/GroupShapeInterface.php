<?php

namespace Shape;

interface GroupShapeInterface extends ShapeInterface
{
    public function getShapesCount(): int;

    public function getShapeAtIndex(int $index): ?ShapeInterface;

    public function insertShape(ShapeInterface $shape, ?int $position = null): void;

    public function removeShapeAtIndex(int $index): void;
}