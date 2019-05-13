<?php

namespace State;

use GumballMachine\GumballMachineContextInterface as GumballMachineContext;

class NoQuarterState implements StateInterface
{
    /** @var GumballMachineContext */
    private $gumballMachineContext;

    public function __construct(GumballMachineContext $gumballMachineContext)
    {
        $this->gumballMachineContext = $gumballMachineContext;
    }

    public function insertQuarter(): void
    {
        try
        {
            $this->gumballMachineContext->addQuarter();
            echo 'You inserted a quarter' . PHP_EOL;
        }
        catch (\OutOfRangeException $ex)
        {
            echo $ex->getMessage() . PHP_EOL;
        }
        $this->gumballMachineContext->setHasQuarterState();
    }

    public function ejectQuarter(): void
    {
        echo 'You haven\'t inserted a quarter' . PHP_EOL;
    }

    public function turnCrank(): void
    {
        echo 'You turned but there\'s no quarter' . PHP_EOL;
    }

    public function dispense(): void
    {
        echo 'You need to pay first' . PHP_EOL;
    }

    public function refillBall(int $numBalls): void
    {
        $this->gumballMachineContext->addBall($numBalls);
        $ballCount = $this->gumballMachineContext->getBallCount();
        echo "You refill {$numBalls} ball. Ball count: {$ballCount}." . PHP_EOL;
    }

    public function ToString(): string
    {
        return 'waiting for quarter';
    }
}