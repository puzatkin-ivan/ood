<?php

namespace NaiveGumballMachine;

use PHPUnit\Framework\TestCase;

class NaiveGumballMachineTest extends TestCase
{
    /** @var string */
    private $expectedFileName;
    /** @var string */
    private $actualFileName;

    public function testGumballMachineWithZeroBall(): void
    {
        $gm = new NaiveGumballMachine(0);
        $this->assertEquals($gm->getBallCount(), 0);
    }

    public function testGumballMachineInfoWhenGumballMachineIsEmpty(): void
    {
        $expectedOutput = <<<EOF
Mighty Gumball, Inc.
PHP-enabled Standing Gumball Model #2019 (with state)
Inventory: 0 gumballs
Machine is sold out
EOF;
        $gm = new NaiveGumballMachine(0);
        $this->executeTestCase(function () use ($gm) {
            echo $gm->toString();
        }, $expectedOutput);
    }

    public function testTurnCrankWhenGumballMachineIsEmpty(): void
    {
        $expectedOutput = 'You turned but there\'s no gumballs' . PHP_EOL;
        $expectedOutput .= 'No gumball dispensed' . PHP_EOL;
        $gm = new NaiveGumballMachine(0);
        $this->executeTestCase(function() use ($gm) {
            $gm->turnCrank();
        }, $expectedOutput);
    }

    public function testInsertQuarterWhenGumballMachineIsEmpty(): void
    {
        $expectedOutput = 'You can\'t insert a quarter, the machine is sold out' . PHP_EOL;
        $gm = new NaiveGumballMachine(0);
        $this->executeTestCase(function() use ($gm) {
            $gm->insertQuarter();
        }, $expectedOutput);
    }

    public function testEjectQuarterWhenGumballMachineIsEmpty(): void
    {
        $expectedOutput = 'You can\'t eject, you haven\'t inserted a quarter yet' . PHP_EOL;
        $gm = new NaiveGumballMachine(0);
        $this->executeTestCase(function() use ($gm) {
            $gm->ejectQuarter();
        }, $expectedOutput);
    }

    public function testGumballMachineInfoWhenGumballMachineIsNotEmpty(): void
    {
        $count = 2;
        $expectedOutput = <<<EOF
Mighty Gumball, Inc.
PHP-enabled Standing Gumball Model #2019 (with state)
Inventory: {$count} gumballs
Machine is waiting for quarter
EOF;
        $gm = new NaiveGumballMachine($count);
        $this->executeTestCase(function () use ($gm) {
            echo $gm->toString();
        }, $expectedOutput);
    }

    public function testImpossibleTurnCrankWhenGumballMachineIsNotEmpty(): void
    {
        $expectedOutput = 'You turned but there\'s no quarter' . PHP_EOL;
        $expectedOutput .= 'You need to pay first' . PHP_EOL;
        $gm = new NaiveGumballMachine(1);
        $this->executeTestCase(function() use ($gm) {
            $gm->turnCrank();
        }, $expectedOutput);
    }

    public function testImpossibleEjectQuarterWhenGumballMachineIsNotEmptyAndDidNotInsertedQuarter(): void
    {
        $expectedOutput = 'You haven\'t inserted a quarter' . PHP_EOL;
        $gm = new NaiveGumballMachine(1);
        $this->executeTestCase(function() use ($gm) {
            $gm->ejectQuarter();
        }, $expectedOutput);
    }

    public function testImpossibleTwiceInsertQuarterWhenGumballMachineIsNotEmpty(): void
    {
        $expectedOutput = 'You inserted a quarter' . PHP_EOL;
        $expectedOutput .= 'You inserted a quarter' . PHP_EOL;
        $gm = new NaiveGumballMachine(1);
        $this->executeTestCase(function() use ($gm) {
            $gm->insertQuarter();
            $gm->insertQuarter();
        }, $expectedOutput);
    }

    public function testImpossibleTwiceEjectQuarterWhenGumballMachineIsNotEmpty(): void
    {
        $expectedOutput = 'You inserted a quarter' . PHP_EOL;
        $expectedOutput .= 'Quarter returned' . PHP_EOL;
        $expectedOutput .= 'You haven\'t inserted a quarter' . PHP_EOL;
        $gm = new NaiveGumballMachine(1);
        $this->executeTestCase(function() use ($gm) {
            $gm->insertQuarter();
            $gm->ejectQuarter();
            $gm->ejectQuarter();
        }, $expectedOutput);
    }

    public function testImpossibleTurnCrankWhenGumballMachineIsNotEmptyAndDidNotInsertedQuarter(): void
    {
        $expectedOutput = 'You turned but there\'s no quarter' . PHP_EOL;
        $expectedOutput .= 'You need to pay first' . PHP_EOL;
        $gm = new NaiveGumballMachine(1);
        $this->executeTestCase(function() use ($gm) {
            $gm->turnCrank();
        }, $expectedOutput);
    }

    public function testTurnCrankTwiceWhenGumballMachineHaveOneBallAndInsertedQuarter(): void
    {
        $expectedOutput = 'You inserted a quarter' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'Oops, out of gumballs' . PHP_EOL;
        $expectedOutput .= 'You turned but there\'s no gumballs' . PHP_EOL;
        $expectedOutput .= 'No gumball dispensed' . PHP_EOL;
        $gm = new NaiveGumballMachine(1);
        $this->executeTestCase(function() use ($gm) {
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->turnCrank();
        }, $expectedOutput);
    }

    public function testTurnCrankTwiceWhenGumballMachineIsNotEmptyAndInsertedQuarter(): void
    {
        $expectedOutput = 'You inserted a quarter' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'You turned but there\'s no quarter' . PHP_EOL;
        $expectedOutput .= 'You need to pay first' . PHP_EOL;
        $gm = new NaiveGumballMachine(2);
        $this->executeTestCase(function() use ($gm) {
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->turnCrank();
        }, $expectedOutput);
    }

    public function testInsertQuarterWhenTurnedCrankAndGumballMachineHaveOneGumball(): void
    {
        $expectedOutput = 'You inserted a quarter' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'Oops, out of gumballs' . PHP_EOL;
        $expectedOutput .= 'You can\'t insert a quarter, the machine is sold out' . PHP_EOL;
        $gm = new NaiveGumballMachine(1);
        $this->executeTestCase(function() use ($gm) {
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->insertQuarter();
        }, $expectedOutput);
    }

    public function testResetQuarterWhenGumballMachineIsEmpty(): void
    {
        $expectedOutput = 'You inserted a quarter' . PHP_EOL;
        $expectedOutput .= 'You inserted a quarter' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'Oops, out of gumballs' . PHP_EOL;
        $expectedOutput .= 'Reset 1 quarter' . PHP_EOL;
        $expectedOutput .= 'You can\'t insert a quarter, the machine is sold out' . PHP_EOL;
        $gm = new NaiveGumballMachine(1);
        $this->executeTestCase(function() use ($gm) {
            $gm->insertQuarter();
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->insertQuarter();
        }, $expectedOutput);
    }

    public function testInsertQuarterWhenTurnedCrankAndGumballMachineHaveMoreOneGumball(): void
    {
        $expectedOutput = 'You inserted a quarter' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'You inserted a quarter' . PHP_EOL;
        $gm = new NaiveGumballMachine(2);
        $this->executeTestCase(function() use ($gm) {
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->insertQuarter();
        }, $expectedOutput);
    }

    public function testEjectQuarterWhenTurnedCrankAndGumballMachineHaveOneGumball(): void
    {
        $expectedOutput = 'You inserted a quarter' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'Oops, out of gumballs' . PHP_EOL;
        $expectedOutput .= 'You can\'t eject, you haven\'t inserted a quarter yet' . PHP_EOL;
        $gm = new NaiveGumballMachine(1);
        $this->executeTestCase(function() use ($gm) {
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->ejectQuarter();
        }, $expectedOutput);
    }

    public function testEjectQuarterWhenTurnedCrankAndGumballMachineHaveMoreOneGumball(): void
    {
        $expectedOutput = 'You inserted a quarter' . PHP_EOL;
        $expectedOutput .= 'You turned...' . PHP_EOL;
        $expectedOutput .= 'A gumball comes rolling out the slot...' . PHP_EOL;
        $expectedOutput .= 'You haven\'t inserted a quarter' . PHP_EOL;
        $gm = new NaiveGumballMachine(2);
        $this->executeTestCase(function() use ($gm) {
            $gm->insertQuarter();
            $gm->turnCrank();
            $gm->ejectQuarter();
        }, $expectedOutput);
    }

    private function executeTestCase(callable $instruction, string $expectedOutput): void
    {
        ob_start();
        call_user_func($instruction);
        $result = ob_get_clean();
        file_put_contents($this->expectedFileName, $expectedOutput);
        file_put_contents($this->actualFileName, $result);
        $this->assertFileEquals($this->expectedFileName, $this->actualFileName);
    }

    protected function setUp()
    {
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