<?php

namespace State;

use GumballMachine\GumballMachineContext;
use PHPUnit\Framework\TestCase;

class NoQuarterStateTest extends TestCase
{
    /** @var GumballMachineContext */
    private $gm;
    /** @var string */
    private $expectedFileName;
    /** @var string */
    private $actualFileName;

    public function testStateToString(): void
    {
        $state = new NoQuarterState($this->gm);
        $actualResult = $state->ToString();

        $expectedResult = 'waiting for quarter';
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testInsertQuarter(): void
    {
        $state = new NoQuarterState($this->gm);

        ob_start();
        $state->insertQuarter();
        $actualResult = ob_get_clean();

        $expectedResult = 'You inserted a quarter' . PHP_EOL;
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testEjectQuarter(): void
    {
        $state = new NoQuarterState($this->gm);

        ob_start();
        $state->ejectQuarter();
        $actualResult = ob_get_clean();

        $expectedResult = 'You haven\'t inserted a quarter' . PHP_EOL;
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testTurnCrank(): void
    {
        $state = new NoQuarterState($this->gm);

        ob_start();
        $state->turnCrank();
        $actualResult = ob_get_clean();

        $expectedResult =  'You turned but there\'s no quarter' . PHP_EOL;
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testDispense(): void
    {
        $state = new NoQuarterState($this->gm);

        ob_start();
        $state->dispense();
        $actualResult = ob_get_clean();

        $expectedResult = 'You need to pay first' . PHP_EOL;
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    protected function setUp()
    {
        $this->gm = new GumballMachineContext(0);
        $this->expectedFileName = uniqid() . '.txt';
        $this->actualFileName = uniqid() . '.txt';
        parent::setUp();
    }

    protected function tearDown()
    {
        if (file_exists($this->expectedFileName))
        {
            unlink($this->expectedFileName);
        }
        if (file_exists($this->actualFileName))
        {
            unlink($this->actualFileName);
        }
        parent::tearDown();
    }
}