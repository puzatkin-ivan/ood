<?php

namespace State;

use GumballMachine\GumballMachineInterface as GumballMachine;

class HasQuarterState implements StateInterface
{
    /** @var GumballMachine */
    private $gumballMachine;

    public function __construct(GumballMachine $gumballMachine)
    {
        $this->gumballMachine = $gumballMachine;
    }

    public function insertQuarter(): void
    {
        echo 'You can\'t insert another quarter' . PHP_EOL;
    }

    public function ejectQuarter(): void
    {
        echo 'Quarter returned' . PHP_EOL;
        $this->gumballMachine->setNoQuarterState();
    }

    public function turnCrank(): void
    {
        echo 'You turned...' . PHP_EOL;
        $this->gumballMachine->setSoldState();
    }

    public function dispense(): void
    {
        echo 'No gumball dispensed' . PHP_EOL;
    }

    public function ToString(): string
    {
        return 'waiting for turn of crank';
    }
}
