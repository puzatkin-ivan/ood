<?php

namespace shape;

use app\BaseTestCase;
use canvas\Canvas;
use color\Color;

class RectangleTest extends BaseTestCase
{
    /** @var Point */
    private $from;
    /** @var Point */
    private $to;
    /** @var string */
    private $color;
    /** @var Rectangle */
    private $rectangle;

    /**
     * @throws \exception\ShapeFactoryException
     */
    protected function setUp(): void
    {
        $this->from = new Point(12, 12);
        $this->to = new Point(31, 12);
        $this->color = Color::getColorByType(Color::DEFAULT);
        $this->rectangle = new Rectangle($this->from, $this->to, $this->color);
        parent::setUp();
    }

    public function testDrawRectangle(): void
    {
        $canvas = new Canvas();
        $canvas->setColor($this->color);
        ob_start();
        $this->rectangle->draw($canvas);
        $actualOutput = ob_get_clean();
        file_put_contents($this->actualFileName, $actualOutput);
        file_put_contents($this->expectedFileName, $this->getExpectedOutput($this->from, $this->to, $this->color));
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    private function getExpectedOutput(Point $leftTop, Point $rightBottom, string $color): string
    {
        $rightTop = new Point($rightBottom->getX(), $leftTop->getY());
        $leftBottom = new Point($leftTop->getX(), $rightBottom->getY());
        $output = $this->getExpectedOutputForDrawLine($leftTop, $rightTop, $color);
        $output .= $this->getExpectedOutputForDrawLine($rightTop, $rightBottom, $color);
        $output .= $this->getExpectedOutputForDrawLine($rightBottom, $leftBottom, $color);
        $output .= $this->getExpectedOutputForDrawLine($leftBottom, $leftTop, $color);
        return $output;
    }
}