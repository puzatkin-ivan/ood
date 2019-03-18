<?php

namespace shape;

use app\BaseTestCase;
use canvas\Canvas;
use color\Color;

class EllipseTest extends BaseTestCase
{
    /** @var Point */
    private $center;
    /** @var float */
    private $verticalRadius;
    /** @var float */
    private $horizontalRadius;
    /** @var string */
    private $color;
    /** @var Ellipse */
    private $ellipse;

    protected function setUp(): void
    {
        $this->center = new Point(10, 10);
        $this->verticalRadius = 10;
        $this->horizontalRadius = 21;
        $this->color = Color::getColorByType(Color::DEFAULT);
        $this->ellipse = new Ellipse($this->center, $this->horizontalRadius, $this->verticalRadius, $this->color);
        parent::setUp();
    }

    public function testDrawEllipse(): void
    {
        $canvas = new Canvas();
        ob_start();
        $this->ellipse->draw($canvas);
        $actualOutput = ob_get_clean();
        file_put_contents($this->actualFileName, $actualOutput);
        file_put_contents($this->expectedFileName, $this->getExpectedOutput());
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    private function getExpectedOutput(): string
    {
        $left = $this->center->getX() - $this->horizontalRadius;
        $top = $this->center->getY() - $this->verticalRadius;
        return $this->getExpectedOutputForDrawEllipse($left, $top, $this->horizontalRadius, $this->verticalRadius, $this->color);
    }
}