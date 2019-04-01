<?php

namespace app;

use PHPUnit\Framework\TestCase;
use shape\Point;

class BaseTestCase extends TestCase
{
    /** @var string */
    protected $expectedFileName;
    /** @var string */
    protected $actualFileName;

    protected function setUp(): void
    {
        $uid = uniqid();
        $this->expectedFileName = './resources/expected_' . $uid . '.txt';
        $this->actualFileName = './resources/actual_' . $uid . '.txt';
        parent::setUp();
    }

    protected function tearDown(): void
    {
        unlink($this->expectedFileName);
        unlink($this->actualFileName);
        parent::tearDown();
    }

    protected function getExpectedOutputForDrawEllipse(float $left, float $top, float $width, float $height, string $color): string
    {
        $output = 'Draw ellipse:' . PHP_EOL;
        $output .= '- left: ' . $left . PHP_EOL;
        $output .= '- top: ' . $top . PHP_EOL;
        $output .= '- width: ' . $width . PHP_EOL;
        $output .= '- height: ' . $height . PHP_EOL;
        $output .= '- color: ' . $color . PHP_EOL;
        return $output;
    }

    protected function getExpectedOutputForDrawLine(Point $from, Point $to, string $color): string
    {
        $output = 'Draw line:' . PHP_EOL;
        $output .= '- from( ' . $from->getX() . ', ' . $from->getY() . ' )' . PHP_EOL;
        $output .= '- to( ' . $to->getX() . ', ' . $to->getY() . ' )' . PHP_EOL;
        $output .= '- color( ' . $color . ' )' . PHP_EOL;
        return $output;
    }
}