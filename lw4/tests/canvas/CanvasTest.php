<?php

namespace canvas;

use app\BaseTestCase;
use color\Color;
use shape\Point;

class CanvasTest extends BaseTestCase
{
    /** @var Canvas */
    private $fixture;
    private $color;

    protected function setUp(): void
    {
        $this->color = Color::getColorByType(Color::DEFAULT);
        $this->fixture = new Canvas();
        $this->fixture->setColor($this->color);
        parent::setUp();
    }

    /**
     * @throws \exception\ShapeFactoryException
     */
    public function testCanDrawLine(): void
    {
        $from = new Point(10, 10);
        $to = new Point(10, 10);
        ob_start();
        $this->fixture->drawLine($from, $to);
        $actualOutput = ob_get_clean();
        file_put_contents($this->actualFileName, $actualOutput);
        $expectedOutput = $this->getExpectedOutputForDrawLine($from, $to, $this->color);
        file_put_contents($this->expectedFileName, $expectedOutput);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testCanDrawEllipse(): void
    {
        ob_start();
        $this->fixture->drawEllipse(45, 23, 23, 65);
        $actualOutput = ob_get_clean();
        $expectedOutput = $this->getExpectedOutputForDrawEllipse(45, 23, 23, 65, $this->color);
        file_put_contents($this->expectedFileName, $expectedOutput);
        file_put_contents($this->actualFileName, $actualOutput);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }
}
