<?php

namespace State;

use GumballMachine\GumballMachineContextInterface as GumballMachineContext;

class SoldState implements StateInterface
{
    /** @var GumballMachineContext */
    private $gumballMachineContext;

    public function __construct(GumballMachineContext $gumballMachineContext)
    {
        $this->gumballMachineContext = $gumballMachineContext;
    }

    public function insertQuarter(): void
    {
        echo 'Please wait, we\'re already giving you a gumball' . PHP_EOL;
    }

    public function ejectQuarter(): void
    {
        echo 'Sorry you already turned the crank' . PHP_EOL;
    }

    public function turnCrank(): void
    {
        echo 'Turning crank will give nothing.' . PHP_EOL;
    }

    public function dispense(): void
    {
        $this->gumballMachineContext->releaseBall();
        if ($this->gumballMachineContext->getBallCount() == 0)
        {
            echo 'Oops, out of gumballs' . PHP_EOL;
            $this->gumballMachineContext->resetQuarters();
            $this->gumballMachineContext->setSoldOutState();
        }
        else if ($this->gumballMachineContext->getQuarterCount() == 0)
        {
            $this->gumballMachineContext->setNoQuarterState();
        }
        else
        {
            $this->gumballMachineContext->setHasQuarterState();
        }
    }

    public function ToString(): string
    {
        return 'delivering a gumball';
    }
}
