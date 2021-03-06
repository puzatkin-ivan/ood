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
        $adapter->setColor('#0000FF');
        $adapter->beginDraw();
        $adapter->moveTo(20, 32);
        $adapter->lineTo(55, 12);
        $adapter->endDraw();
        $result = ob_get_clean();
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