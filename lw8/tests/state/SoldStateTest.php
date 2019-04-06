<?php

namespace State;

use GumballMachine\GumballMachine;
use PHPUnit\Framework\TestCase;

class SoldStateTest extends TestCase
{
    /** @var int */
    private $count = 10;
    /** @var GumballMachine */
    private $gm;
    /** @var string */
    private $expectedFileName;
    /** @var string */
    private $actualFileName;

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

    protected function setUp()
    {
        $this->gm = new GumballMachine($this->count);
        $this->expectedFileName = uniqid() . '.txt';
        $this->actualFileName = uniqid() . '.txt';
        parent::setUp();
    }

    protected function tearDown()
    {
        unlink($this->expectedFileName);
        unlink($this->actualFileName);
        parent::tearDown();
    }
}