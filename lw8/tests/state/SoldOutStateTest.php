<?php

namespace State;

use GumballMachine\GumballMachine;
use PHPUnit\Framework\TestCase;

class SoldOutStateTest extends TestCase
{
    /** @var GumballMachine */
    private $gm;
    /** @var string */
    private $expectedFileName;
    /** @var string */
    private $actualFileName;

    public function testStateToString(): void
    {
        $state = new SoldOutState($this->gm);
        $actualResult = $state->ToString();

        $expectedResult = 'sold out';
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testInsertQuarter(): void
    {
        $state = new SoldOutState($this->gm);

        ob_start();
        $state->insertQuarter();
        $actualResult = ob_get_clean();

        $expectedResult = 'You can\'t insert a quarter, the machine is sold out' . PHP_EOL;
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testEjectQuarter(): void
    {
        $state = new SoldOutState($this->gm);

        ob_start();
        $state->ejectQuarter();
        $actualResult = ob_get_clean();

        $expectedResult = 'You can\'t eject, you haven\'t inserted a quarter yet' . PHP_EOL;
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testTurnCrank(): void
    {
        $state = new SoldOutState($this->gm);

        ob_start();
        $state->turnCrank();
        $actualResult = ob_get_clean();

        $expectedResult = 'You turned but there\'s no gumballs' . PHP_EOL;
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testDispense(): void
    {
        $state = new SoldOutState($this->gm);

        ob_start();
        $state->dispense();
        $actualResult = ob_get_clean();

        $expectedResult = 'No gumball dispensed' . PHP_EOL;
        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    protected function setUp()
    {
        $this->gm = new GumballMachine(0);
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