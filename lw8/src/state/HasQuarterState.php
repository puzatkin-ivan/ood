<?php

namespace State;

use GumballMachine\GumballMachineContextInterface as GumballMachineContext;

class HasQuarterState implements StateInterface
{
    /** @var GumballMachineContext */
    private $gumballMachineContext;

    public function __construct(GumballMachineContext $gumballMachineContext)
    {
        $this->gumballMachineContext = $gumballMachineContext;
    }

    public function insertQuarter(): void
    {
        echo 'You can\'t insert another quarter' . PHP_EOL;
    }

    public function ejectQuarter(): void
    {
        echo 'Quarter returned' . PHP_EOL;
        $this->gumballMachineContext->setNoQuarterState();
    }

    public function turnCrank(): void
    {
        echo 'You turned...' . PHP_EOL;
        $this->gumballMachineContext->setSoldState();
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
