<?php

namespace factory;

use shape\Shape;

interface ShapeFactoryInterface
{
    public function createShape(string $description): Shape;
}