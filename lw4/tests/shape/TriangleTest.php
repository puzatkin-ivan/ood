<?php

namespace shape;

use app\BaseTestCase;
use canvas\Canvas;
use color\Color;

class TriangleTest extends BaseTestCase
{
    private $vertex1;
    private $vertex2;
    private $vertex3;
    private $color;
    /** @var Triangle */
    private $triangle;

    protected function setUp(): void
    {
        $this->vertex1 = new Point(12, 12);
        $this->vertex2 = new Point(31, 12);
        $this->vertex3 = new Point(1, 12);
        $this->color = Color::getColorByType(Color::DEFAULT);
        $this->triangle = new Triangle($this->vertex1, $this->vertex2, $this->vertex3, $this->color);
        parent::setUp();
    }

    public function testDrawTriangle(): void
    {
        $canvas = new Canvas();
        ob_start();
        $this->triangle->draw($canvas);
        $actualOutput = ob_get_clean();
        file_put_contents($this->actualFileName, $actualOutput);
        file_put_contents($this->expectedFileName, $this->getExpectedOutput());

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    private function getExpectedOutput(): string
    {
        $output = $this->getExpectedOutputForDrawLine($this->vertex1, $this->vertex2, $this->color);
        $output .= $this->getExpectedOutputForDrawLine($this->vertex2, $this->vertex3, $this->color);
        $output .= $this->getExpectedOutputForDrawLine($this->vertex3, $this->vertex1, $this->color);
        return $output;
    }
}