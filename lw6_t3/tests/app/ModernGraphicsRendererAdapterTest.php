<?php

namespace App;

use ModernGraphicsLib\ModernGraphicsRenderer;
use ModernGraphicsLib\Point;
use ModernGraphicsLib\RGBAColor;
use PHPUnit\Framework\TestCase;

class ModernGraphicsRendererAdapterTest extends TestCase
{
    /** @var string */
    private $fileNameWithExpectedResult;
    /** @var string */
    private $fileNameWithActualResult;

    public function testAdapterBehavesLikeObject(): void
    {
        $expectedResult = <<<EOF
<draw>
  <line fromX="20.0" fromY="32.0" toX="55.0" toY="12.0">
    <color r="0.0" g="0.0" b="255.0" a="1.0" />
  </line>
</draw>

EOF;
        ob_start();
        $renderer = new ModernGraphicsRenderer();
        $adapter = new ModernGraphicsRendererAdapter($renderer);
        $adapter->beginDraw();
        $adapter->setColor('#0000FF');
        $adapter->moveTo(20, 32);
        $adapter->lineTo(55, 12);
        $adapter->endDraw();
        $result = ob_get_clean();
        file_put_contents($this->fileNameWithExpectedResult, $expectedResult);
        file_put_contents($this->fileNameWithActualResult, $result);

        $this->assertFileEquals($this->fileNameWithExpectedResult, $this->fileNameWithActualResult);
    }

    public function testAdapterCanBehavesLikeRenderer(): void
    {
        $expectedResult = <<<EOF
<draw>
  <line fromX="14.0" fromY="45.0" toX="85.0" toY="45.0">
    <color r="0.0" g="0.0" b="0.0" a="1.0" />
  </line>
  <line fromX="65.0" fromY="35.0" toX="23.0" toY="15.0">
    <color r="45.0" g="65.0" b="75.0" a="0.9" />
  </line>
</draw>

EOF;
        ob_start();
        $renderer = new ModernGraphicsRenderer();
        $adapter = new ModernGraphicsRendererAdapter($renderer);
        $adapter->beginDraw();
        $adapter->drawLine(new Point(14, 45), new Point(85, 45), new RGBAColor(0, 0, 0, 1));
        $adapter->drawLine(new Point(65, 35), new Point(23, 15), new RGBAColor(45, 65, 75, 0.9));
        $adapter->endDraw();
        $result = ob_get_Clean();
        file_put_contents($this->fileNameWithExpectedResult, $expectedResult);
        file_put_contents($this->fileNameWithActualResult, $result);

        $this->assertFileEquals($this->fileNameWithExpectedResult, $this->fileNameWithActualResult);
    }

    protected function setUp()
    {
        $this->fileNameWithExpectedResult = uniqid() . '.txt';
        $this->fileNameWithActualResult = uniqid() . '.txt';
        parent::setUp();
    }

    protected function tearDown()
    {
        if (file_exists($this->fileNameWithExpectedResult))
        {
            unlink($this->fileNameWithExpectedResult);
        }

        if (file_exists($this->fileNameWithActualResult))
        {
            unlink($this->fileNameWithActualResult);
        }
        parent::tearDown();
    }
}