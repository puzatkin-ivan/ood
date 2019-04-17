<?php

namespace State;

use GumballMachine\GumballMachineContextInterface as GumballMachineContext;

class SoldOutState implements StateInterface
{
    /** @var GumballMachineContext */
    private $gumballMachineContext;

    public function __construct(GumballMachineContext $gumballMachineContext)
    {
        $this->gumballMachineContext = $gumballMachineContext;
    }

    public function insertQuarter(): void
    {
        echo 'You can\'t insert a quarter, the machine is sold out' . PHP_EOL;
    }

    public function ejectQuarter(): void
    {
        echo 'You can\'t eject, you haven\'t inserted a quarter yet' . PHP_EOL;
    }

    public function turnCrank(): void
    {
        echo 'You turned but there\'s no gumballs' . PHP_EOL;
    }

    public function dispense(): void
    {
        echo 'No gumball dispensed' . PHP_EOL;
    }

    public function ToString(): string
    {
        return 'sold out';
    }
}
