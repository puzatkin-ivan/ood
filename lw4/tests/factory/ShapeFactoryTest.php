<?php

namespace factory;

use color\Color;
use PHPUnit\Framework\TestCase;
use shape\Point;
use shape\Rectangle;
use shape\Shape;

class ShapeFactoryTest extends TestCase
{
    /**
     * @throws \exception\ShapeFactoryException
     */
    public function testCreateShapeWithExtraSpaces(): void
    {
        $expectedShape = $this->getExpectedRectangle();
        $input = 'rectangle  10  10  10  10 green';
        $factory = new ShapeFactory();
        $shape = $factory->createShape($input);
        $this->assertEquals($expectedShape, $shape);
    }

    private function getExpectedRectangle(): Shape
    {
        return new Rectangle(
            new Point(10, 10),
            new Point(10, 10),
            Color::getColorByType(Color::DEFAULT));
    }
}