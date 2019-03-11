<?php

namespace factory;

use color\Color;
use Exception;
use exception\IncorrectCountOfArgument;
use exception\ShapeFactoryException;
use shape\Ellipse;
use shape\Point;
use shape\Rectangle;
use shape\RegularPolygon;
use shape\Shape;
use shape\Triangle;

class ShapeFactory implements ShapeFactoryInterface
{
    private const RECTANGLE = 'rectangle';
    private const TRIANGLE = 'triangle';
    private const ELLIPSE = 'ellipse';
    private const POLYGON = 'polygon';

    /**
     * @param string $description
     * @return Shape
     * @throws ShapeFactoryException
     */
    public function createShape(string $description): Shape
    {
        $explodedDescription = explode(' ', $description);
        switch (strtolower($explodedDescription[0]))
        {
            case self::RECTANGLE:
                return $this->createRectangle($explodedDescription);
            case self::TRIANGLE:
                return $this->createTriangle($explodedDescription);
            case self::ELLIPSE:
                return $this->createEllipse($explodedDescription);
            case self::POLYGON:
                return $this->createRegularPolygon($explodedDescription);
            default:
                throw new ShapeFactoryException("Incorrect type of shape.");
        }
    }

    /**
     * @param string[] $explodedDescription
     * @return Rectangle
     * @throws IncorrectCountOfArgument
     */
    private function createRectangle(array $explodedDescription): Shape
    {
        if (count($explodedDescription) != 6)
        {
            throw new IncorrectCountOfArgument();
        }

        $leftTop = new Point(floatval($explodedDescription[1]), floatval($explodedDescription[2]));
        $rightBottom = new Point(floatval($explodedDescription[3]), floatval($explodedDescription[4]));
        $color = Color::getColorByType($explodedDescription[5]);
        return new Rectangle($leftTop, $rightBottom, $color);
    }

    /**
     * @param string[] $explodedDescription
     * @return Triangle
     * @throws IncorrectCountOfArgument
     */
    private function createTriangle(array $explodedDescription): Shape
    {
        if (count($explodedDescription) != 8)
        {
            throw new IncorrectCountOfArgument();
        }

        $vertex1 = new Point(floatval($explodedDescription[1]), floatval($explodedDescription[2]));
        $vertex2 = new Point(floatval($explodedDescription[3]), floatval($explodedDescription[4]));
        $vertex3 = new Point(floatval($explodedDescription[5]), floatval($explodedDescription[6]));
        $color = Color::getColorByType($explodedDescription[5]);
        return new Triangle($vertex1, $vertex2, $vertex3, $color);
    }

    /**
     * @param string[] $explodedDescription
     * @return Ellipse
     * @throws IncorrectCountOfArgument
     */
    private function createEllipse(array $explodedDescription): Shape
    {
        if (count($explodedDescription) != 6)
        {
            throw new IncorrectCountOfArgument();
        }

        $center = new Point(floatval($explodedDescription[1]), floatval($explodedDescription[2]));
        $horizontalRadius = floatval($explodedDescription[3]);
        $verticalRadius = floatval($explodedDescription[4]);
        $color = Color::getColorByType($explodedDescription[5]);
        return new Ellipse($center, $horizontalRadius, $verticalRadius, $color);
    }

    /**
     * @param string[] $explodedDescription
     * @return Shape
     * @throws IncorrectCountOfArgument
     */
    private function createRegularPolygon(array $explodedDescription): Shape
    {
        if (count($explodedDescription) != 6)
        {
            throw new IncorrectCountOfArgument();
        }
        $center = new Point(floatval($explodedDescription[1]), floatval($explodedDescription[2]));
        $vertexCount = intval($explodedDescription[3]);
        $radius = floatval($explodedDescription[4]);
        $color = Color::getColorByType($explodedDescription[5]);
        return new RegularPolygon($center, $radius, $vertexCount, $color);
    }
}
