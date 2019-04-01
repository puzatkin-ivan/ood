<?php

namespace shape;

use canvas\CanvasInterface;
use Exception;
use exception\ShapeFactoryException;

class RegularPolygon extends Shape
{
    /** @var Point */
    private $center;
    /** @var float */
    private $radius;
    /** @var int */
    private $vertexCount;

    public function __construct(Point $center, float $radius, int $vertexCount, string $color)
    {
        if ($vertexCount < 0)
        {
            new ShapeFactoryException("The count of corners can't be less than zero.");
        }
        parent::__construct($color);
        $this->center = $center;
        $this->radius = $radius;
        $this->vertexCount = $vertexCount;
    }

    public function draw(CanvasInterface $canvas): void
    {
        $canvas->setColor($this->getColor());

        $angle = $this->getAngle();

        $fromX = $this->center->getX() + $this->radius + cos(0);
        $from = new Point($fromX, $this->center->getY());

        $centerX = $this->center->getX();
        $centerY = $this->center->getY();
        for ($index = 1; $index <= $this->vertexCount; ++$index)
        {
            $toX = $centerX + $this->radius * cos($angle * $index);
            $toY = $centerY + $this->radius * sin($angle * $index);
            $to = new Point($toX, $toY);

            $canvas->drawLine($from, $to);
            $from = $to;
        }
    }

    public function getVertexCount(): int
    {
        return $this->vertexCount;
    }

    public function getCenter(): Point
    {
        return clone $this->center;
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    private function getAngle(): float
    {
        if ($this->vertexCount == 0)
        {
            new ShapeFactoryException("Division by zero is impossible");
        }
        return 2 * M_PI / $this->vertexCount;
    }
}