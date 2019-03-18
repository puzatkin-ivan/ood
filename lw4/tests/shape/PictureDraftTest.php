<?php

namespace shape;

use color\Color;
use PHPUnit\Framework\TestCase;

class PictureDraftTest extends TestCase
{
    /** @var PictureDraft */
    private $pictureDraft;

    protected function setUp(): void
    {
        $this->pictureDraft = new PictureDraft();
        parent::setUp();
    }

    public function testAddShape()
    {
        $color = Color::getColorByType(Color::DEFAULT);
        $shape = new Rectangle(new Point(10, 10), new Point(19, 12), $color);
        $this->pictureDraft->addShape($shape);
        $this->assertTrue($this->pictureDraft->getShapeCount() == 1);
    }
}