<?php

namespace App;

use ModernGraphicsLib\ModernGraphicsRenderer;
use PHPUnit\Framework\TestCase;

class ModernGraphicsRendererAdapterTest extends TestCase
{
    /** @var string */
    private $fileNameWithExpectedResult;
    /** @var string */
    private $fileNameWithActualResult;

    public function testAdapterCanMoveToAndLineTo(): void
    {
        $expectedResult = <<<EOF
<draw>
  <line fromX="20" fromY="32" toX="55" toY="12" />
</draw>

EOF;

        ob_start();
        $renderer = new ModernGraphicsRenderer();
        $adapter = new ModernGraphicsRendererAdapter($renderer);
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