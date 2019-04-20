<?php

namespace GumballMachine;

use State\StateInterface as State;
use State\HasQuarterState;
use State\NoQuarterState;
use State\SoldOutState;
use State\SoldState;

class GumballMachineContext implements GumballMachineContextInterface
{
    /** @var SoldState */
    private $soldState;
    /** @var SoldOutState */
    private $soldOutState;
    /** @var NoQuarterState */
    private $noQuarterState;
    /** @var HasQuarterState */
    private $hasQuarterState;
    /** @var State */
    private $state;
    /** @var int */
    private $ballCount;
    /** @var int */
    private $quarterCount;

    public function __construct(int $numBalls)
    {
        $this->soldState = new SoldState($this);
        $this->soldOutState = new SoldOutState($this);
        $this->noQuarterState = new NoQuarterState($this);
        $this->hasQuarterState = new HasQuarterState($this);
        $this->state = $this->soldState;
        $this->ballCount = $numBalls;
        $this->quarterCount = 0;

        if ($this->ballCount > 0)
        {
            $this->state = $this->noQuarterState;
        }
    }

    public function releaseBall(): void
    {
        if ($this->ballCount != 0 && $this->quarterCount != 0)
        {
            echo 'A gumball comes rolling out the slot...' . PHP_EOL;
            --$this->ballCount;
            --$this->quarterCount;
        }
    }

    public function getBallCount(): int
    {
        return $this->ballCount;
    }

    public function getQuarterCount(): int
    {
        return $this->quarterCount;
    }

    public function addQuarter(): void
    {
        if ($this->quarterCount == 5)
        {
            throw new \OutOfRangeException("Gumball machine can hold up to 5 quarter.");
        }
        ++$this->quarterCount;
    }

    public function setSoldOutState(): void
    {
        $this->state = $this->soldOutState;
    }

    public function setNoQuarterState(): void
    {
        $this->quarterCount = 0;
        $this->state = $this->noQuarterState;
    }

    public function setSoldState(): void
    {
        $this->state = $this->soldState;
    }

    public function setHasQuarterState(): void
    {
        $this->state = $this->hasQuarterState;
    }

    public function ejectQuarter(): void
    {
        $this->state->ejectQuarter();
    }

    public function insertQuarter(): void
    {
        $this->state->insertQuarter();
    }

    public function turnCrank(): void
    {
        $this->state->turnCrank();
        $this->state->dispense();
    }

    public function toString(): string
    {
        $str = $this->getStringTemplate();
        $postfix = ($this->ballCount != 1 ? 's' : '');
        return sprintf($str, $this->ballCount, $postfix, $this->state->ToString());
    }

    private function getStringTemplate(): string
    {
        return <<<EOF
Mighty Gumball, Inc.
PHP-enabled Standing Gumball Model #2019 (with state)
Inventory: %d gumball%s
Machine is %s
EOF;
    }
}