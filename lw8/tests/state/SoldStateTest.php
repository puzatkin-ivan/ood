<?php

namespace State;

use GumballMachine\GumballMachineContext;
use PHPUnit\Framework\TestCase;

class SoldStateTest extends TestCase
{
    /** @var GumballMachineContext */
    private $gm;
    /** @var string */
    private $expectedFileName;
    /** @var string */
    private $actualFileName;

    public function testStateToString(): void
    {
        $state = new SoldState($this->gm);

        $expectedResult = 'delivering a gumball';
        $actualResult = $state->toString();

        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testInsertQuarter(): void
    {
        $expectedResult = 'Please wait, we\'re already giving you a gumball' . PHP_EOL;
        $state = new SoldState($this->gm);

        ob_start();
        $state->insertQuarter();
        $actualResult = ob_get_clean();

        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testEjectQuarter(): void
    {
        $expectedResult = 'Sorry you already turned the crank' . PHP_EOL;
        $state = new SoldState($this->gm);

        ob_start();
        $state->ejectQuarter();
        $actualResult = ob_get_clean();

        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testTurnCrank(): void
    {
        $expectedResult = 'Turning crank will give nothing.' . PHP_EOL;
        $state = new SoldState($this->gm);

        ob_start();
        $state->turnCrank();
        $actualResult = ob_get_clean();

        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testDispenseWhenGumballMachineIsEmpty(): void
    {
        $expectedResult = 'Oops, out of gumballs' . PHP_EOL;
        $state = new SoldState($this->gm);

        ob_start();
        $state->dispense();
        $actualResult = ob_get_clean();

        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testDispenseWhenGumballMachineHasOneGumball(): void
    {
        $expectedResult = 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedResult .=  'Oops, out of gumballs' . PHP_EOL;
        $gm = new GumballMachineContext(1);
        $gm->addQuarter();
        $state = new SoldState($gm);

        ob_start();
        $state->dispense();
        $actualResult = ob_get_clean();

        file_put_contents($this->expectedFileName, $expectedResult);
        file_put_contents($this->actualFileName, $actualResult);

        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    public function testDispenseWhenGumballMachineHasMoreOneGumball(): void
    {
        $expectedResult = 'A gumball comes rolling out the slot...' . PHP_EOL;
        $gm = new GumballMachineContext(2);
        $gm->addQuarter();
        $state = new SoldState($gm);

        ob_start();
        $state->dispense();
        $actualResult = ob_get_clean();

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