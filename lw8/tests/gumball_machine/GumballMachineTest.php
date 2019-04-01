<?php

namespace GumballMachine;

use PHPUnit\Framework\TestCase;

class GumballMachineTest extends TestCase
{
    public function testGumballMachineWithZeroBall(): void
    {
        $gm = new GumballMachine(0);
        $this->assertEquals($gm->getBallCount(), 0);
    }
}